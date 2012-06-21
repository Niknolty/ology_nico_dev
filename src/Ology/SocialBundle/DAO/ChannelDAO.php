<?php
namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\Cache\ChannelCache;

class ChannelDAO {
    protected $em;
    
    function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function getChannel($stub) {
        $c = $this->em->getRepository('OlogySocialBundle:Channel')->findOneBy(array('stub' => $stub));
        if (!$c)
            throw new DAOException('ChannelDAO: No channel found with stub ' . $stub);
        return $c;
    }
    
    public function getChannels() {
        return $this->em->getRepository('OlogySocialBundle:Channel')->findAll();
    }
    
    public function storeChannel($stub, $ad0, $ad1, $ad2, $ad3, $ad4, $ad5, $ad6, $video, $p1, $p2, $p3, $p4, $p5, $sPostTitle, $sp1, $sp2, $sp3) {
        $channel = $this->em->getRepository('OlogySocialBundle:Channel')->findOneBy(array('stub' => $stub));
        if (!$channel)
            throw new DAOException('ChannelDAO: No channel found with stub ' . $stub);
        
        $channel->setAd0($ad0);
        $channel->setAd1($ad1);
        $channel->setAd2($ad2);
        $channel->setAd3($ad3);
        $channel->setAd4($ad4);
        $channel->setAd5($ad5);
        $channel->setAd6($ad6);
        $channel->setVideo($video);
        
        if ($p1 && $p1 != '')
            $channel->setFeaturedPost1($this->em->getReference('OlogySocialBundle:Post', $p1));
        if ($p2 && $p2 != '')
            $channel->setFeaturedPost2($this->em->getReference('OlogySocialBundle:Post', $p2));
        if ($p3 && $p3 != '')
            $channel->setFeaturedPost3($this->em->getReference('OlogySocialBundle:Post', $p3));
        if ($p4 && $p4 != '')
            $channel->setFeaturedPost4($this->em->getReference('OlogySocialBundle:Post', $p4));
        if ($p5 && $p5 != '')
            $channel->setFeaturedPost5($this->em->getReference('OlogySocialBundle:Post', $p5));
        
        if ($sp1 && $sp1 != '')
            $channel->setSpecialPost1($this->em->getReference('OlogySocialBundle:Post', $sp1));
        if ($sp2 && $sp2 != '')
            $channel->setSpecialPost2($this->em->getReference('OlogySocialBundle:Post', $sp2));
        if ($sp3 && $sp3 != '')
            $channel->setSpecialPost3($this->em->getReference('OlogySocialBundle:Post', $sp3));
        
        $channel->setSpecialTitle($sPostTitle);
        $this->em->persist($channel);
        $this->em->flush();

        return $channel;
    }

}

?>