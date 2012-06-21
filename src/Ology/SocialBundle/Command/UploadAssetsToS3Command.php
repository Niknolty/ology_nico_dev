<?php
namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ology\SocialBundle\Utility\MimeType;



class UploadAssetsToS3Command extends ContainerAwareCommand
{
    
    protected $s3;
    protected $s3_bucket;
    protected $dir_list = array('css', 'js', 'img', 'up');
    protected $s3_path = 'bundles/ologysocial';
    
    protected function configure()
    {
        parent::configure();
        $this->setName('ology:assets_to_s3')->setDescription('Upload assets to s3');
    }
    
    /**
    * Initialize whatever variables you may need to store beforehand, also load
    * Doctrine from the Container
    */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method    
                
        $this->s3           = $this->getContainer()->get('aws_s3');  
        $this->s3_bucket    = $this->getContainer()->getParameter('s3_bucket');
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
        $path = __DIR__ . "/../Resources/public";

        foreach($this->dir_list as $dir)
        {
            $list = $this->getFilesFromDir($path."/".$dir);

            foreach($list as $src) 
            {
                $dest = str_replace($path, $this->s3_path, $src);
                $file_resource = fopen($src, 'r');
                $response = $this->s3->create_object($this->s3_bucket, $dest, array(
                        'fileUpload' => $file_resource,
                        'contentType' => MimeType::get_mimetype(pathinfo($src, PATHINFO_EXTENSION)),
                        'acl' => "public-read"
                ));
 
                if(!$response->isOK())
                {
                    throw new \Exception("Can't upload to S3");
                }
            }
            
            echo "Assets uploaded\r\n";
            
        }
    }    
    
    
    private function getFilesFromDir($dir) { 

        $files = array(); 
        if ($handle = opendir($dir)) { 
            while (false !== ($file = readdir($handle))) { 
                if ($file != "." && $file != "..") { 
                    if(is_dir($dir.'/'.$file)) { 
                        $dir2 = $dir.'/'.$file; 
                        $files[] = $this->getFilesFromDir($dir2); 
                    } 
                    else { 
                    $files[] = $dir.'/'.$file; 
                    } 
                } 
            } 
            closedir($handle); 
        } 

        return $this->array_flat($files); 
    } 

    private function array_flat($array) { 
        $tmp = array();
        foreach($array as $a) { 
            if(is_array($a)) { 
                $tmp = array_merge($tmp, $this->array_flat($a)); 
            } 
            else { 
            $tmp[] = $a; 
            } 
        } 
        return $tmp; 
    }
}

?>
