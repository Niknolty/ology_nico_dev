<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MergeAccountCommand extends ContainerAwareCommand
{
    protected $mergeService;

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('ology:merge:account')
            ->setDescription('Merging one account to another and remove unused one')
            ->addArgument('userID', InputArgument::REQUIRED, 'User ID account to keep')
            ->addArgument('oldUserID', InputArgument::REQUIRED, 'User ID account to merge and then remove')
            ->setHelp('In the DB, all olduser ids are replaced with the new account ID. Old user is disabled. Cache is refreshed. In short, all olduser posts are now owned by the new user. To see all changes, take a look to MergeService file.')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method
        $this->mergeService = $this->getContainer()->get('social.service.merge');
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
        $userId = $input->getArgument('userID');
        $oldUserId = $input->getArgument('oldUserID');
        $result = 0;
        $result = $this->mergeService->mergeAccounts($userId, $oldUserId);
        
        $output->writeln("");
        $output->writeln(sprintf('>> Total number of row updated in the DB : %s.', $result));
        $output->writeln(">> Cache refreshed too. Well done!");
    }
    
    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("/!\ WARNING /!\\");
        $output->writeln("This command merge one account to another migrating posts etc. and disable the old user account.");
        $output->writeln("Before using this command, you MUST check the file named MergeService too see what is gonna be modified or not.");
        $output->writeln("Because this command will be outdated as developping continue, you HAVE TO add new functions to complete merge users.");
        $output->writeln("");
        
        if (!$input->getArgument('userID')) {
            $userID = $this->getHelper('dialog')->askAndValidate(
                $output,
                'User ID to keep:',
                function($userID)
                {
                    if (empty($userID)) {
                        throw new \Exception('Username ID can\'t be empty, n00b');
                    }

                    return $userID;
                }
            );
            $input->setArgument('userID', $userID);
        }

        if (!$input->getArgument('oldUserID')) {
            $oldUserID = $this->getHelper('dialog')->askAndValidate(
                $output,
                'User ID to merge and then disable:',
                function($oldUserID)
                {
                    if (empty($oldUserID)) {
                        throw new \Exception('Username ID can\'t be empty, n00b');
                    }

                    return $oldUserID;
                }
            );
            $input->setArgument('oldUserID', $oldUserID);
        }
    }

}

