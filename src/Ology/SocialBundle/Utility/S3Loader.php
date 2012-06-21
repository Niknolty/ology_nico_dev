<?php

namespace Ology\SocialBundle\Utility;

use \Exception;


class S3Loader {

    protected $s3service;
    protected $s3bucket;

    function __construct($container) {
        $this->s3service = $container->get('aws_s3');
        $this->s3bucket  = $container->getParameter('s3_bucket');

    }

    public function createObject($src, $dest){
        try{
            $response = $this->s3service->create_object($this->s3bucket, $dest,
                array( 'fileUpload' => $src, 'acl' => "public-read")
            );
            return $response->isOK();
        }
        catch (\Exception $e) {
            throw new Exception("Wrong upload file to S3: $e");
        }
    }

    public function deleteObject($path){
        try{
            $response = $this->s3service->delete_object($this->s3bucket, $path);
            return $response->isOK();
        }
        catch (\Exception $e) {
            throw new Exception("Wrong delete file from S3: $e");
        }
    }

    public function copyObject($src, $dest){
        try{
            $response = $this->s3service->copy_object(
                array( 'bucket' => $this->s3bucket, 'filename' => $src),
                array( 'bucket' => $this->s3bucket, 'filename' => $dest),
                array('acl' => "public-read")
            );
            return $response->isOK();
        }
        catch (\Exception $e) {
            throw new Exception("Wrong copy file on S3: $e");
        }
    }

    public function ifObjectExist($path){
        $response = $this->s3service->if_object_exists($this->s3bucket, $path);
        return $response;
    }
}

?>