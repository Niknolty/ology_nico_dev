<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ology\SocialBundle\Entity\User;

class UsersFromCSVCommand extends ContainerAwareCommand
{
    // change the timeout value in php.ini before importing
    protected $_em;
    protected $logPath = '/tmp/migration_user.log';
    protected $full_log;
    protected $prev_type = 'message';

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('ology:user')
            ->setDescription('Migrate user from CSV file')
            ->addArgument('call', InputArgument::REQUIRED, 'Call_method')
            ->addArgument('csv_file_path', InputArgument::REQUIRED, 'csv_file_path')
            ->addArgument('default_pass', InputArgument::REQUIRED, 'default_pass')
        ;
    }

//    /**
//    * Initialize whatever variables you may need to store beforehand, also load
//        * Doctrine from the Container
//    */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method
        $this->full_log = fopen($this->logPath, 'a');
        $this->_em = $this->getContainer()->get('doctrine')->getEntityManager();
        $configuration = $this->_em->getConnection()->getConfiguration();
        $configuration->setSQLLogger(null);
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return integer 0 if everything went fine, or an error code
     *
     * @throws \LogicException When this abstract class is not implemented
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $csv_file_path = $input->getArgument('csv_file_path');
        $default_pass = $input->getArgument('default_pass');

        $arg = $input->getArgument('call');
        switch ($arg) {
            case 'import':
                $result = $this->importUsers($csv_file_path, $default_pass);
                break;
            default:
                $result = 'incorrect command';
        }
        $output->writeln(sprintf('%s', $result));
    }

    private function importUsers($csv_file_path, $default_pass) {
        if (!file_exists($csv_file_path)){
            return 'bad file path';
        }
        if(!$default_pass){
            return 'bad default pass';
        }

        $handle = fopen($csv_file_path, "r");
        // skip the first line whith column name
        $data = fgetcsv($handle);
        if($data[0] != "Email" || $data[1] != "First Name" || $data[2] != "Last Name" || isset($data[3])){
            return 'bad file stucture';
        }
        $count_steps = count(file($csv_file_path)) -1;

        $userManager = $this->getContainer()->get('fos_user.user_manager');
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $i = 0;
        $j = 0;
        $skip = 0;
        $created = 0;

        $this->_logProgress('message', "Start");

        while (($data = fgetcsv($handle, 1000, ",", '"')) !== FALSE) {

            $j++;
            if (!isset($data[0]) || !isset($data[1]) || !isset($data[2])){
                $skip++;
                if(isset($data[0])){
                    $this->_logProgress('message', "Bad record with " . $data[0] . " email. This record was skiped.");
                }
                continue;
            }

            $firstname = $data[1];
            $email = $data[0];
            $lastname = $data[2];

            $res = $this->_em->getRepository('OlogySocialBundle:User')->findByEmailCanonical($email);
            if(count($res)){
                $skip++;
                $this->_logProgress('message', "User with $email email already exists. This record was skiped.");
                continue;
            }else{
                $i++;
            }

            $this->_logProgress('progress', 'Processing: %d of %d (%1.2f%%). (' . $email .')' , $j, $count_steps);

            $created++;

            $user = $userManager->createUser();

            $email = $this->cleanMail($email);
            $user->setFirstName($firstname);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $encoder = $this->getContainer()->get('security.encoder_factory')->getEncoder($user);
            $current_pass = $encoder->encodePassword($default_pass, $user->getSalt());
            $user->setPassword($current_pass);

            $user->setEnabled(true);
            $user->setUsername($email);
            $user->setInitEmail($email);

            $user->setAcceptsNotifNewMember(false);
            $user->setAcceptsNotifNewPost(false);
            $user->setAcceptsNotifNewCommentOwnPost(false);
            $user->setAcceptsNotifNewCommentOtherPost(false);
            $user->setDisplayBday(true);
            $user->setDisplayYear(false);
            $user->setDoNotEmail(true);

            $em->persist($user);

            if ($i == 100) {
                $i = 0;
                $em->flush();
                $em->clear();
            }
        }
        if ($i > 0) {
            $i = 0;
            $em->flush();
            $em->clear();
        }
        $this->_logProgress('message', "Finish");
        return "\n". "$created users were migrated. $skip user were skipped.";
    }

    private function cleanMail($email) {
        return preg_replace("/[^A-Za-z0-9\s\s+\.\:\-\/%+\(\)\*\&\$\#\!\@\"\';\_]/", "", $email);
    }

    private function _logProgress($type, $message = '', $num = 1, $goal = 1) {
        if (($this->prev_type == 'progress') && ($type != 'progress') ) {
            echo "\n";
        }

        if ($type == 'message') {
            $this->prev_type = $type;
            $logMessage = $message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'exception') {
            $this->prev_type = $type;
            $logMessage = $message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'image_info') {
            $this->prev_type = $type;
            $logMessage = ' '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'time') {
            $this->prev_type = $type;
            $logMessage = ' ==== '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'memory') {
            $this->prev_type = $type;
            $logMessage = '      '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        else
            if ($type == 'progress' ) {
                if ($message == ''){
                    $message = 'Progress: %d of %d (%1.2f%%)';
                }
                if ($goal == 0){
                    $goal = 1;
                }
                $logMessage = sprintf($message, $num, $goal, $num/$goal*100);
                fwrite($this->full_log, $logMessage."\n");
                $this->prev_type = $type;
                echo str_repeat(chr(8), 150);
                echo str_pad($logMessage, 150, " ");
            }
            else {
                return FALSE;
            }
        return TRUE;
    }

}

