<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\Query\ResultSetMapping;
use Ology\SocialBundle\Cache\OlogyCache;
use Ology\SocialBundle\DAO\StatsDAO;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Entity\FeaturedOlogy;
use Ology\SocialBundle\Entity\Membership;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\Utility\ImagickService;
use Ology\SocialBundle\Utility\Slug;
use Predis\Client;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Ology\SocialBundle\Utility\S3Loader;

class OlogyDAO {
    const OLOGY_IMG_PREFIX = 'ology_';
    const OLOGY_IMG_SMA_WSIZE = 50;
    const OLOGY_IMG_MID_WSIZE = 120;
    const OLOGY_IMG_BIG_WSIZE = 200;


    protected $redis;
    protected $em;
    protected $ologyCache;

    protected $container;
    protected $s3loader;
    protected $tmp_dir;

    function __construct(EntityManager $em, Client $redis, OlogyCache $ologyCache, $container) {
        $this->em = $em;
        $this->redis = $redis;
        $this->ologyCache = $ologyCache;
        $this->container = $container;
        $this->s3loader = new S3Loader($this->container);
        $this->tmp_dir = $this->container->getParameter('tmp_dir');
    }

    public function createOlogy($founderId, $name, $description, UploadedFile $image, $visible, $readOnly) {
        $founder = $this->em->getReference('OlogySocialBundle:User', $founderId);

        $newOlogy = new Ology();
        $newOlogy->setFounder($founder);
        $newOlogy->setName($name);
        $newOlogy->setDescription($description);
        $newOlogy->setVisibility($visible);
        $newOlogy->setReadOnly($readOnly);
        $newOlogy->setSlug(Slug::str_slug($name));

        if ($image != NULL) {
            $ext = $image->guessExtension();
            $fileName = uniqid(OlogyDAO::OLOGY_IMG_PREFIX, true) . "." . $ext;
            $fileName = $this->moveAndResizeImage($image, $fileName);
            if ($fileName){
                $newOlogy->setImageUrl($fileName);
            }
        }

        $this->em->persist($newOlogy);
        $this->em->flush();

        return $newOlogy;
    }

    public function updateOlogy($ologyId, $name, $description, UploadedFile $image = null, $visible, $readOnly) {
        $ology = $this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId);

        if (!$ology)
            throw new DAOException("OlogyDAO: updateOlogy($ologyId): No ology found for id " . $ologyId);

        $ology->setName($name);
        $ology->setDescription($description);
        $ology->setVisibility($visible);
        $ology->setReadOnly($readOnly);
        $ology->setupdateDate(time());
       
        if ($image) {
            $oldFile = $ology->getImageUrl();

            $ext = $image->guessExtension();
            $fileName = uniqid(OlogyDAO::OLOGY_IMG_PREFIX, true) . "." . $ext;
            $fileName = $this->moveAndResizeImage($image, $fileName);
            $this->deleteImage($oldFile, "$ologyId, $name, $description, $image, $visible, $readOnly");
            if ($fileName){
                $ology->setImageUrl($fileName);
            }
        }

        $this->em->flush();

        return $ology;
    }

    public function deleteOlogy($ologyId) {
        $ology = $this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId);

        if (!$ology)
            return false;

        $this->deleteImage($ology->getImageUrl(), $ologyId);

        $this->em->remove($ology);
        $this->em->flush();
        return true;
    }

    public function getFounder($ologyId) {
        $ology = $this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId);
        if (!$ology)
            throw new DAOException("OlogyDAO: getFounder($ologyId): No ology found for id $ologyId");

        return $ology->getFounder();
    }

    public function getOlogy($ologyId) {
        $ology = $this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId);

        if (!$ology)
            throw new DAOException("OlogyDAO: getOlogy($ologyId): No ology found for id $ologyId");

        return $ology;
    }

    public function getMostRecentByLabels($arrayLabels, $offset, $number) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o');
                        
        
        if (count($arrayLabels) > 0) {
            $qb->innerJoin('o.ologylabels', 'lo', Join::WITH, 'o = lo.ology');
            $qb->where('lo.label IN (?1)');
        }
        
        $qb->addOrderBy('o.creationDate', 'DESC');

        $query = $qb->getQuery();
        if (count($arrayLabels) > 0)
            $query->setParameter(1, $arrayLabels);
        $query->setFirstResult($offset);
        $query->setMaxResults($number + 1);
        $array = $query->getResult();

        return $array;
    }
    
    public function getMostRecentByInterests($interests, $offset, $number) {
        if (count($interests) == 0)
            return array();
        
        $names = array();
        foreach ($interests as $interest)
            $names[] = $interest->getName();
        $sNames = implode('|', $names);
        
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Ology', 'o');
        $rsm->addFieldResult('o', 'ology_id', 'id');
        $rsm->addFieldResult('o', 'image_url', 'imageUrl');
        $rsm->addFieldResult('o', 'description', 'description');
        $sql = "SELECT o.id as ology_id, o.image_url as image_url, o.description as description
                FROM Ologies o
                WHERE o.name REGEXP ?
                LIMIT ?, ?";

        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter(1, "'$sNames'");
        $query->setParameter(2, intval($offset));
        $query->setParameter(3, intval($number));
        $partialOlogies = $query->getResult();
        
        if (count($partialOlogies) == 0)
            return array();
        
        $ids = array();
        foreach ($partialOlogies as $pOlogy)
            $ids[] = $pOlogy->getId();
        $ologies = $this->em->createQueryBuilder()
                        ->add('select', 'o, f')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->join('o.founder', 'f')
                        ->where('o.id IN (?1)')
                        ->orderBy('o.creationDate', 'DESC')
                        ->getQuery()
                        ->setParameter(1, $ids)
                        ->getResult();
        
        //die(\Ology\SocialBundle\Utility\TVarDumper::dump($res, 3, true));
        return $ologies;
    }

    public function getMostRecent($offset, $number) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->orderBy('o.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setFirstResult($offset);
        $query->setMaxResults($number);
        $array = $query->getResult();

        return $array;
    }

    public function getMostOlogist($number) {
        $writeIdx = $this->redis->get(CacheDAO::MOST_OLOG_NEXT_IDX);

        if ($writeIdx == NULL)
            throw new DAOException('OlogyDAO: getMostOlogist: Cache not init -- key ' . CacheDAO::MOST_OLOG_NEXT_IDX);

        $readIdx = ($writeIdx == CacheDAO::IDX_A) ? CacheDAO::IDX_B : CacheDAO::IDX_A;
        $key = CacheDAO::MOST_OLOG_PREFIX . $readIdx;
        $ologyIds = $this->redis->get($key);

        if ($ologyIds == NULL)
            throw new DAOException('OlogyDAO: getMostOlogist: Cache not init -- key ' . $key);
        $ids = explode(':', $ologyIds);
        $ologies = $this->getOlogiesById($ids);

        return $ologies;
    }

    public function getOlogiesById($arrayId) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->where('o.id IN (?1)');

        $query = $qb->getQuery();
        $query->setParameter(1, $arrayId);
        $ologies = $query->getResult();

        // Sort in the same order than in the original array
        $sorted = array();
        $place = array();

        $size = sizeof($arrayId);
        for ($i = 0; $i < $size; $i++) {
            $intValue = $arrayId[$i];
            $place[$intValue] = $i;
        }

        foreach ($ologies as $ology) {
            $id = $ology->getId();
            $sorted[$place[$id]] = $ology;
        }
        ksort($sorted);

        return $sorted;
    }

    public function getOlogies() {
        $ologies = $this->em->getRepository('OlogySocialBundle:Ology')->findAll();
        return $ologies;
    }

    public function getByFounder($founderId, $n = -1) {
        $query = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->where('o.founder = ?1')
                        ->getQuery();

        $query->setParameter(1, $founderId);
        if ($n > 0)
            $query->setMaxResults($n);

        return $query->getResult();
    }
    
    // TODO get from REDIS cache
    public function getOlogiesIdsForUser($founderId, $n = -1) {
        $query = $this->em->createQuery('SELECT o.id FROM Ology\SocialBundle\Entity\Ology o WHERE o.founder = ?1');
        $query->setParameter(1, $founderId);
        if ($n != -1)
            $query->setMaxResults($n);
        $ologiesIds = $query->getResult();
        
        $ids = array();
        foreach ($ologiesIds as $ologyId) {
            $ids[] = $ologyId['id'];
            // Save in parallele in REDIS HERE
        }
        
        return $ids;
    }
    
    public function getByName($name) {
        $nameb = str_replace("'", " ", $name);
        $namec = str_replace('"', " ", $nameb);
        $query = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->where("o.name LIKE ?1")
                        ->getQuery();

        $query->setParameter(1, "%$namec%");
        $query->setMaxResults(1);

        $res = $query->getResult();
        if (count($res) == 0)
            return NULL;
        return $res[0];
    }

    public function getFeaturedOlogies() {
        $query = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->innerJoin('o.featured', 'f', Join::WITH, 'o = f.ology')
                        ->orderBy('f.position', 'ASC')
                        ->getQuery();

        $array = $query->getResult();

        return $array;
    }

    public function getBlacklistedOlogies() {
        $query = $this->em->createQueryBuilder()
                        ->add('select', 'o')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->where('o.blacklisted = ?1')
                        ->getQuery()
                        ->setParameter(1, true);

        $array = $query->getResult();

        return $array;
    }
    
    public function setBlacklistedOlogies($ologyIdsArray) {
        if (count($ologyIdsArray) == 0)
            return;
        
        $qb = $this->em->createQueryBuilder();
        $qb->update('OlogySocialBundle:Ology', 'o')
                ->set('o.blacklisted', 'NULL')
                ->where('o.blacklisted = ?1')
                ->getQuery()
                ->setParameter(1, true)
                ->getResult();
        
        return $this->em->createQueryBuilder()
                    ->update('OlogySocialBundle:Ology', 'o')
                    ->set('o.blacklisted', true)
                    ->where('o.id IN (?1)')
                    ->getQuery()
                    ->setParameter(1, $ologyIdsArray)
                    ->getResult();
    }
    
    public function setFeaturedOlogies($ologyIdsArray) {
        $this->em->createQuery('DELETE OlogySocialBundle:FeaturedOlogy fo')
                ->getResult();

        $i = 1;
        foreach ($ologyIdsArray as $ologyId) {
            $o = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
            $fo = new FeaturedOlogy();
            $fo->setOlogy($o);
            $fo->setPosition($i++);
            $this->em->persist($fo);
        }
        $this->em->flush();
    }

    public function getOlogiesForSitemap() {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'o.id, o.slug, o.updateDate')
                        ->from('OlogySocialBundle:Ology', 'o');   
        $query = $qb->getQuery();
        $ologies = $query->getResult();
        
        return $ologies;
    }

    public function getOlogiesByPrefix($prefix) {
        $ids = $this->ologyCache->getOlogyIdsStartingWith($prefix);
        if ($ids == NULL)
            return array();
        $idsArray = explode(CacheDAO::SEP, $ids);
        
        $res = array();
        foreach ($idsArray as $id) {
            if ($id != "") {
                $ology = array();
                $ology['id'] = $id;
                $ology['name'] = $this->redis->get(OlogyCache::OLOGY_PREFIX . $id . OlogyCache::OLOGY_NAME_SUFFIX);
                $ology['image'] = $this->redis->get(OlogyCache::OLOGY_PREFIX . $id . OlogyCache::OLOGY_IMG_SUFFIX);
                $res[] = $ology;
            }
        }
        
        return $res;
    }
    

    private function moveAndResizeImage($image, $fileName) {
        $img = $image->move($this->tmp_dir, $fileName);

        if ($img) {
            $this->s3loader->createObject($this->tmp_dir . $fileName, $this->container->getParameter('ology_original_image_path') . $fileName);

            $fileNamePNG = str_replace(strrchr($fileName, '.'), '.png', $fileName);

            if (ImagickService::roundUpImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, OlogyDAO::OLOGY_IMG_MID_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileNamePNG, $this->container->getParameter('ology_medium_image_path') . $fileNamePNG );
            if (ImagickService::roundUpImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, OlogyDAO::OLOGY_IMG_BIG_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileNamePNG, $this->container->getParameter('ology_large_image_path') . $fileNamePNG );
            if (ImagickService::roundUpImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, OlogyDAO::OLOGY_IMG_SMA_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileNamePNG, $this->container->getParameter('ology_small_image_path') . $fileNamePNG );
            unlink($this->tmp_dir . 'resized_' . $fileName);
            if($fileName != $fileNamePNG)
                unlink($this->tmp_dir . 'resized_' . $fileNamePNG);
            unlink($this->tmp_dir . $fileName);
            return $fileNamePNG;
        } else {
            return false;
        }
    }

    private function deleteImage($fileName, $message = ''){
        if ($fileName && $fileName != 'default.png') {
            try {
                $this->s3loader->deleteObject($this->container->getParameter('ology_original_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('ology_medium_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('ology_large_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('ology_small_image_path') . $fileName );
            } catch (\ErrorException $e) {
                throw new DAOException("OlogyDAO: updateOlogy($message): Cannot remove oldfile: $fileName");
            }
        }
    }
}