<?php

namespace Ology\SocialBundle\Controller\Admin;

use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\DAO\OlogyDAO;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\Membership;
use Ology\SocialBundle\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\ServiceException;
use PDO;
use Ology\SocialBundle\Utility\ImagickService;
use Ology\SocialBundle\Utility\Slug;

/**
 * Description of ImportController
 *
 * @author Erwan
 */
class ImportController extends Controller {

    // change the timeout value in php.ini before importing
    protected $host = 'localhost';
    protected $table = 'ology3b';
    protected $login = 'ology3b';
    protected $pass = 'heiC2yish4ph';
    protected $old_img_path = '/var/www/ology3b/sites/default/files/';
    protected $old_audio_path = '/var/www/ology3b/sites/default/files/';
    protected $new_path = '/var/www/ology4/web/bundles/ologysocial/up';
    protected $img_dir = '/img';
    protected $audio_dir = '/aud/';
    protected $user_dir = '/user/';
    protected $user_prefix = 'user_';
    protected $post_dir = '/post/';
    protected $post_prefix = 'post_';
    protected $ology_dir = '/ology/';
    protected $ology_prefix = 'ology_';
    // include the file name
    protected $logPath = '/tmp/migration.log';

    const USER_IMG_BIG = 250;
    const USER_IMG_MED = 60;
    const USER_IMG_SMA = 30;

    /*
      protected $table = 'ology3';
      protected $login = 'root';
      protected $pass = 'ology';
     */

    /**
     * @Route("/resize/img/sma", name="_resize_sma")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function resizeImgSmall() {
        $root = "/var/www/ology4/web/bundles/ologysocial/up";
        $path = $root . $this->img_dir . $this->post_dir;

        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository('OlogySocialBundle:Post')->findAll();

        if (!file_exists($path . PostDAO::POST_IMG_SMA))
            mkdir($path . PostDAO::POST_IMG_SMA, 0777, true);

        foreach ($posts as $post) {
            if ($post->getImageUrl()) {
                if (file_exists($path . $post->getImageUrl())) {
                    ImagickService::resizeImage($path . $post->getImageUrl(), $path . PostDAO::POST_IMG_SMA . $post->getImageUrl(), PostDAO::POST_IMG_SMA_WSIZE);
                }
            }
        }
    }

    /**
     * @Route("/all", name="_all_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importAll() {
        $this->importUsers();
        $this->importOlogy();
        $this->importMembership();
        $this->importPostOnly();
        $this->importPostOlogy();
        $this->importComment();
        $this->importCommentSon();
        $this->move_files();
    }

    /**
     * @Route("/user", name="_user_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importUsers() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query("SELECT u.name AS name,
    u.pass AS pass,
    u.mail AS email,
    u.created AS creation_date,
    u.access AS last_access,
    u.login AS last_login,
    u.init AS init_email,
    f.field_firstname_value AS firstname,
    l.field_lastname_value AS lastname,
    s.field_selfsummary_value AS selfdescription,
    replace(file.uri,'public://','') AS pics_file,
    replace(b.field_birthday_value,'T00:00:00','') AS birthday,
    sex.field_usersex_value AS usersex,
    fb.facebook_id AS fbtoken
    FROM users u
    LEFT JOIN field_data_field_lastname l ON u.uid = l.entity_id
    LEFT JOIN field_data_field_firstname f ON u.uid = f.entity_id
    LEFT JOIN field_data_field_birthday b ON u.uid = b.entity_id
    LEFT JOIN field_data_field_selfsummary s ON u.uid = s.entity_id
    LEFT JOIN field_data_field_usersex sex ON u.uid = sex.entity_id
    LEFT JOIN field_data_field_user_picture pics ON u.uid = pics.entity_id
    LEFT JOIN file_managed file ON pics.field_user_picture_fid = file.fid
    LEFT JOIN frenzy_facebook fb ON fb.uid = u.uid
    WHERE u.mail IS NOT null 
    AND u.uid!=798
    AND u.uid!=799
    AND u.uid!=1935
    AND u.uid!=2600
    AND u.uid!=2605
    AND u.uid!=2607
    AND u.uid!=3980
    AND u.uid!=4117
    AND u.uid!=4344
    AND u.uid!=4354
    AND u.uid!=4366
    AND u.uid!=4628
    AND u.uid!=4614
    AND u.uid!=4569
    AND u.uid!=4539
    AND u.uid!=4529
    AND u.uid!=4525
    AND u.uid!=4466
    AND u.uid!=4377
    AND u.uid!=4658
    AND u.uid!=4323
    AND u.uid!=4458
    AND u.uid!=6049");



        $userManager = $this->get('fos_user.user_manager');

        $em = $this->getDoctrine()->getEntityManager();
        $i = 0;
        $donnees = $reponse->fetch(); // remove the first empty row
        while ($donnees = $reponse->fetch()) {
            $i++;
            $user = $userManager->createUser();

            $email = $this->cleanMail($donnees['email']);
            $user->setEmail($email);
            if ($email == 'yann.gregoire@ologycorp.com' || $email == 'thion.erwan@gmail.com') {
                $user->setSuperAdmin(true);
            }
            if ($donnees['birthday']) {
                $birthday_array = explode('-', $donnees['birthday']);
                $birthday = $birthday_array[1] . '/' . $birthday_array[2] . '/' . $birthday_array[0];
                $user->setBirthday($birthday);
            }

            $user->setPassword(substr($donnees['pass'], 12));
            $user->setCreationDate($donnees['creation_date']);
            //$user->setLastLogin($time);

            $user->setFirstName($donnees['firstname']);
            $user->setLastName($donnees['lastname']);
            $user->setSummary($this->cleanText($donnees['selfdescription']));

            $user->setSex($donnees['usersex']);
            if ($donnees['pics_file'] && ($donnees['pics_file'] != "Profile Pictures.jpeg") && !preg_match("/^(anonymous-120x120)/", $donnees['pics_file']))
                $user->setImageUrl($donnees['pics_file']);
            $user->setFbToken($donnees['fbtoken']);
            $user->setLastacces($donnees['last_access']);

            $user->setEnabled(true);
            $user->setUsername($this->cleanMail($donnees['email']));

            $user->setInitEmail($this->cleanMail($donnees['init_email']));

            $user->setAcceptsNotifNewMember(false);
            $user->setAcceptsNotifNewPost(false);
            $user->setAcceptsNotifNewCommentOwnPost(false);
            $user->setAcceptsNotifNewCommentOtherPost(false);



            $user->setSalt(substr($donnees['pass'], 0, 12));
            $em->persist($user);
            if ($i == 50) {
                $i = 0;
                $em->flush();
            }
        }
        $em->flush();
    }

    private function cleanMail($email) {
        return preg_replace("/[^A-Za-z0-9\s\s+\.\:\-\/%+\(\)\*\&\$\#\!\@\"\';\_]/", "", $email);
    }

    private function cleanText($text) {
        return preg_replace('/[^(\x20-\x8F)]*/', '', $text);
    }

    /**
     * @Route("/ology", name="_user_ologies_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importOlogy() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query("SELECT n.title AS title,
    n.created AS creation_date,
    n.changed AS changed_date,
    tax.name AS label,
    d.body_value AS description,
    replace(file.uri,'public://','') AS logo,
    u.mail AS user_mail
    FROM node n
    LEFT JOIN og ology ON ology.etid = n.nid
    LEFT JOIN field_data_field_group_category g ON g.entity_id = nid
    LEFT JOIN taxonomy_term_data tax ON tax.tid = g.field_group_category_tid
    LEFT JOIN field_data_body d ON d.entity_id = n.nid
    LEFT JOIN users u ON n.uid = u.uid
    LEFT JOIN field_data_field_group_logo img ON img.entity_id =  n.nid
    LEFT JOIN file_managed file ON img.field_group_logo_fid = file.fid
    WHERE n.type = 'ology_group'");


        $em = $this->getDoctrine()->getEntityManager();
        $labelService = $this->get('social.service.labelology');


        while ($donnees = $reponse->fetch()) {
            //find user
            $user = $em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $donnees['user_mail']));

            $newOlogy = new Ology();
            $newOlogy->setFounder($user);
            $newOlogy->setName($this->cleanText($donnees['title']));
            $newOlogy->setSlug(Slug::str_slug($this->cleanText($donnees['title'])));
            $newOlogy->setDescription($this->cleanText($donnees['description']));
            $newOlogy->setVisibility(true);
            $newOlogy->setReadOnly(true);
            $newOlogy->setCreationDate($donnees['creation_date']);
            $newOlogy->setupdateDate($donnees['changed_date']);
            if ($donnees['logo'] != "mockingjay_0.jpg")
                $newOlogy->setImageUrl($donnees['logo']);

            $em->persist($newOlogy);
            $em->flush();
            if ($donnees['label'])
                $labelService->createLabelOlogyWithLabelName($donnees['label'], $newOlogy->getId(), $user->getId());
            else
                $labelService->createLabelOlogyWithLabelName('other', $newOlogy->getId(), $user->getId());
        }
        $em->flush();
    }

    /**
     * @Route("/postology", name="_postology_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importPostOlogy() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $em = $this->getDoctrine()->getEntityManager();
        $post_array = $em->getRepository('OlogySocialBundle:Post')->findAll();

        $i = 0;
        foreach ($post_array as $post) {
            $i++;
            //find user
            $postOlogies = new PostsOlogies();
            $postOlogies->setOlogy($post->getFirstOlogy());
            $postOlogies->setPost($post);
            $postOlogies->setPostedAt($post->getCreationDate());
            $postOlogies->setPostedBy($post->getAuthor());
            $em->persist($postOlogies);
            if ($i == 30) {
                $i = 0;
                $em->flush();
            }
        }

        $em->flush();
    }

    /**
     * @Route("/post", name="_post_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importPostOnly() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query("SELECT
            post.title AS title,
            post.created AS post_creation_date,
            post.changed AS post_update_date,
            body.body_value AS content,
            n.created AS ology_creation_date,
            n.title AS ology_name,
            u.mail AS user_mail,
	    replace(file.uri,'public://','') AS file_name,
            video.field_video_value AS video_url,
            audio_file.filename AS audio_file
            FROM og_membership membership
            JOIN og ology ON membership.gid = ology.gid
            JOIN node n ON ology.etid = n.nid
            JOIN node post ON post.nid = membership.etid
            JOIN users u ON u.uid = post.uid
            LEFT JOIN field_data_body body ON body.entity_id = membership.etid
            LEFT JOIN field_data_field_image img ON  post.nid = img.entity_id
            LEFT JOIN file_managed file ON file.fid = img.field_image_fid
            LEFT JOIN field_data_field_video video ON video.entity_id = post.nid
            LEFT JOIN field_data_field_audio audio ON audio.entity_id = post.nid
            LEFT JOIN file_managed audio_file ON audio.field_audio_fid = audio_file.fid
            WHERE membership.entity_type = 'node' AND post.title IS NOT NULL");


        $em = $this->getDoctrine()->getEntityManager();
        $i = 0;

        while ($donnees = $reponse->fetch()) {
            $i++;
            //find user
            $user = $em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $this->cleanMail($donnees['user_mail'])));
            $ology = $em->getRepository('OlogySocialBundle:Ology')->findOneBy(array('name' => $this->cleanText($donnees['ology_name']), 'creationDate' => $donnees['ology_creation_date']));

            $post = new Post();
            $post->setAuthor($user);

            $post->setTitle($this->cleanText($donnees['title']));
            $post->setSlug(Slug::str_slug($this->cleanText($donnees['title'])));
            $post->setCreationDate($donnees['post_creation_date']);
            $post->setUpdateDate($donnees['post_update_date']);
            $post->setTextContent($this->cleanText($donnees['content']));
            $post->setFirstOlogy($ology);
            $post->setAudioUrl($donnees['audio_file']);

            if ($donnees['file_name'] != 'miley.jpeg')
                $post->setImageUrl($donnees['file_name']);
            if ($donnees['file_name'])
                $post->setAudioUrl(NULL);
            if ($donnees['video_url']) {
                $result = array();
                if (preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $donnees['video_url'], $result))
                    $post->setVideoUrl($result[1]);
                else
                    $post->setTextContent($donnees['content'] . " Video Link: " . $donnees['video_url']);
                $post->setImageUrl(NULL);
                $post->setAudioUrl(NULL);
            }
            $postType = null;
            if ($donnees['video_url'])
                $postType = $em->getReference('OlogySocialBundle:PostType', PostType::VIDEO);
            else if ($donnees['file_name'])
                $postType = $em->getReference('OlogySocialBundle:PostType', PostType::IMAGE);
            else if ($donnees['audio_file'])
                $postType = $em->getReference('OlogySocialBundle:PostType', PostType::AUDIO);
            else
                $postType = $em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
            $post->setPostType($postType);

            $em->persist($post);
            if ($i > 20) {
                sleep(0.4);
                $i = 0;
                $em->flush();
            }
        }
        $em->flush();
    }

    /**
     * @Route("/comment", name="_comment_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importComment() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT
            c.cid AS ident,
            c.subject AS comment_title,
            c.hostname AS host_ip,
            c.created AS creation_date,
            c.changed AS edit_date,
            u.mail AS user_email,
            post.title AS post_title,
            post.created AS post_creation_date,
            body.comment_body_value AS comment_body
            FROM comment c
            JOIN node post ON post.nid = c.nid
            JOIN users u ON u.uid = c.uid
            LEFT JOIN field_data_comment_body body ON body.entity_id = c.cid
            WHERE c.pid = 0 OR c.pid IS NULL
            ');

        $em = $this->getDoctrine()->getEntityManager();
        $i = 0;
        $ourfileHandle = fopen($this->logPath, 'a');
        while ($donnees = $reponse->fetch()) {
            $i++;
            //find user
            $title = $this->cleanText($donnees['post_title']);
            $user = $em->getRepository('OlogySocialBundle:User')->
                            findOneBy(array('email' => $this->cleanMail($donnees['user_email'])));

            $post = $em->getRepository('OlogySocialBundle:Post')->
                            findOneBy(array('title' => $this->cleanText($donnees['post_title']),
                                'creationDate' => $donnees['post_creation_date']));

            if ($post == null OR $user == null) {

                $msg = "\r\nError: " . __FUNCTION__ . " " . $donnees['ident'] . " " . $donnees['post_title'] . " " . $donnees['post_creation_date'] . " " . $donnees['user_email'];
                fwrite($ourfileHandle, $msg);
            } else {
                $comment = new Comment();
                if ($donnees['comment_body'])
                    $comment->update($post, $user, $this->cleanText($donnees['comment_body']), 0);
                else
                    $comment->update($post, $user, $this->cleanText($donnees['comment_title']), 0);
                $comment->setCreationDate($donnees['creation_date']);
                $comment->setUpdateDate($donnees['edit_date']);
                $comment->setHostIP($donnees['host_ip']);

                $post->incrTimeCommented();
                $em->persist($comment);
                if ($i == 20) {
                    $i = 0;
                    $em->flush();
                    sleep(0.5);
                }
            }
        }
        fclose($ourfileHandle);
        $em->flush();
    }

    /**
     * @Route("/comment_son", name="_comment_son_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importCommentSon() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT
            c.subject AS comment_title,
            c.hostname AS host_ip,
            c.created AS creation_date,
            c.changed AS edit_date,
            c.pid AS parent_comment,
            father.created AS parent_creation_date,
            father.subject AS parent_sub,
            father.hostname AS parent_hostip,
            u.mail AS user_email,
            post.title AS post_title,
            post.created AS post_creation_date,
            body.comment_body_value AS comment_body
            FROM comment c
            JOIN node post ON post.nid = c.nid
            JOIN users u ON u.uid = c.uid
            LEFT JOIN field_data_comment_body body ON body.entity_id = c.cid
            LEFT JOIN comment father ON father.cid = c.pid
            WHERE c.pid != 0
   ');

        $em = $this->getDoctrine()->getEntityManager();
        $ourfileHandle = fopen($this->logPath, 'a');
        while ($donnees = $reponse->fetch()) {
            //find user
            $user = $em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $this->cleanMail($donnees['user_email'])));
            $post = $em->getRepository('OlogySocialBundle:Post')->findOneBy(array('title' => $this->cleanText($donnees['post_title']), 'creationDate' => $donnees['post_creation_date']));


            $comment = new Comment();
            if ($donnees['comment_body'])
                $comment->update($post, $user, $this->cleanText($donnees['comment_body']), 0);
            else
                $comment->update($post, $user, $this->cleanText($donnees['comment_title']), 0);
            $comment->setCreationDate($donnees['creation_date']);
            $comment->setUpdateDate($donnees['edit_date']);
            $comment->setHostIP($donnees['host_ip']);

            // to change place problem with timestamp had to check for +/- one, weird though!
            $parent = $em->getRepository('OlogySocialBundle:Comment')->findOneBy(array('hostIP' => $donnees['parent_hostip'], 'creationDate' => $donnees['parent_creation_date']));
            if (!$parent) {
                $nb = $donnees['parent_creation_date'] + 1;
                $parent = $em->getRepository('OlogySocialBundle:Comment')->findOneBy(array('hostIP' => $donnees['parent_hostip'], 'creationDate' => $nb));
            }
            if (!$parent) {
                $nb = $donnees['parent_creation_date'] - 1;
                $parent = $em->getRepository('OlogySocialBundle:Comment')->findOneBy(array('hostIP' => $donnees['parent_hostip'], 'creationDate' => $nb));
            }
            if ($parent != NULL) {
                $comment->setParentComment($parent->getId());
                $parent->incrTimeCommented();
                $post->incrTimeCommented();
                $em->persist($comment);
                $em->flush();
            } else {
                $msg = "\r\nError: " . __FUNCTION__ . ' Comment parent with hostname: ' . $donnees['parent_hostip'] . ' created: ' . $donnees['parent_creation_date'] . 'coulnd\'t be found to match the comment:,comment title: ' . $donnees['comment_title'] . ' creeated: ' . $donnees['creation_date'];
                fwrite($ourfileHandle, $msg);
            }
        }
        fclose($ourfileHandle);
    }

    /**
     * @Route("/membership", name="_membership_import")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function importMembership() {

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->table, $this->login, $this->pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT
            ology.label AS ology_name,
            n.created AS ology_creation_date,
            membership.created AS date_creation,
            n.title AS title,
            u.mail AS user_mail
            FROM og_membership membership
            JOIN og ology ON membership.gid = ology.gid
            JOIN node n ON ology.etid = n.nid
            JOIN users u ON u.uid = membership.etid
            WHERE membership.entity_type = "user" AND u.mail IS NOT NULL');


        $em = $this->getDoctrine()->getEntityManager();
        $membershipType = $em->getRepository('OlogySocialBundle:MembershipType')->findOneBy(array('name' => 'Basic'));
        $i = 0;
        while ($donnees = $reponse->fetch()) {
            $i++;
            //find user
            $user = $em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $this->cleanMail($donnees['user_mail'])));
            if ($user == null)
                die('Error no user found for email: ' . $donnees['user_mail']);
            $ology = $em->getRepository('OlogySocialBundle:Ology')->findOneBy(array('name' => $this->cleanText($donnees['ology_name']), 'creationDate' => $donnees['ology_creation_date']));

            $membership = new membership();
            $membership->setUser($user);
            $membership->setOlogy($ology);
            $membership->setMembershipType($membershipType);
            $membership->setCreationDate($donnees['date_creation']);

            $em->persist($membership);
            if ($i == 100) {
                $i = 0;
                $em->flush();
                sleep(2);
            }
        }

        $em->flush();
    }

    /**
     * @Route("/move/all", name="_move_all_")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function move_files() {
        $this->move_user_files();
        $this->move_ology_files();
        $this->move_post_files();
        $this->move_post_audio_files();
    }

    /**
     * @Route("/move/user", name="_move_user_")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function move_user_files() {
        $userCommentThumb = "styles/user_comment_thumb/public/";
        $userIconLarge = "styles/user_icon_large/public/";
        $userIconSmall = "styles/user_icon_small/public/";
        $thumb = $this->user_prefix . "medium/";
        $large = $this->user_prefix . "large/";
        $small = $this->user_prefix . "small/";

        $path = $this->new_path . $this->img_dir . $this->user_dir;
        if (!file_exists($path . $thumb))
            mkdir($path . $thumb, 0777, true);
        if (!file_exists($path . $large))
            mkdir($path . $large, 0777, true);
        if (!file_exists($path . $small))
            mkdir($path . $small, 0777, true);
        /*
          chmod($path . $thumb, 0777);
          chmod($path . $large, 0777);
          chmod($path . $small, 0777);
         */
        $em = $this->getDoctrine()->getEntityManager();

        $users = $em->getRepository('OlogySocialBundle:User')->findAll();
        // open log file
        $ourfileHandle = fopen($this->logPath, 'a');
        $user_file = fopen('/tmp/resizing_user.log', 'a');
        // move all file in the db
        $i = 0;
        foreach ($users as $user) {
            $currentIMG = $user->getImageUrl(false);
            //$isNewFile = preg_match("/^(user_[:alphanum:])/", $currentIMG));
            if ($currentIMG && $currentIMG != "Profile Pictures.jpeg" && !preg_match("/^(user_([[:alnum:]]){14}\.)/", $currentIMG)) {
                $i++;
                fwrite($user_file, $currentIMG);
                // get ype
                $type = str_replace('.', '', strrchr($currentIMG, '.'));
                // generate new file name
                $newFileName = uniqid($this->user_prefix, true) . "." . $type;

                $move = null;
                // normal
                $file_path = $this->old_img_path . $currentIMG;
                if (file_exists($file_path))
                    $move = copy($file_path, $this->new_path . $this->img_dir . $this->user_dir . $newFileName);

                // if move suceed
                if ($move) {
                    $user->setImageUrl($newFileName, true);
                    $path = $this->new_path . $this->img_dir . $this->user_dir;

                    ImagickService::resizeImage($path . $newFileName,
                                    $path . $large . $newFileName, self::USER_IMG_BIG);
                    ImagickService::resizeImage($path . $newFileName,
                                    $path . $thumb . $newFileName, self::USER_IMG_MED);
                    ImagickService::resizeImage($path . $newFileName,
                                    $path . $small . $newFileName, self::USER_IMG_SMA);
                } else {
                    //log message
                    $msg = "\r\nError: " . __FUNCTION__ . ' File: ' . $this->old_img_path . $currentIMG . ' coulnd\'t be moved, id is:' . $user->getId();
                    $user->setImageUrl(NULL);
                    fwrite($ourfileHandle, $msg);
                }
                if ($i == 50) {
                    $i = 0;
                    $em->flush();
                }
            }
        }
        $em->flush();
        // close log file
        fclose($ourfileHandle);
        fclose($user_file);
    }

    /**
     * @Route("/move/post", name="_move_posts_")
     * @Template("OlogySocialBundle:Ology:import_test.html.twig")
     */
    public function move_post_files() {

        $thumbnail = "styles/thumbnail/public/";

        $path = $this->new_path . $this->img_dir . $this->post_dir;
        $thumbnail_dest = $path . $this->post_prefix . "thumbnail/";

        if (!file_exists($thumbnail_dest))
            mkdir($thumbnail_dest, 0777, true);
        chmod($thumbnail_dest, 0777);


        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository('OlogySocialBundle:Post')->findAll();
        $postType = $em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
        $f = fopen('/tmp/resizing_post.log', 'a');
        // open log file
        $ourfileHandle = fopen($this->logPath, 'a');
        // move all file in the db
        foreach ($posts as $post) {
            $currentIMG = $post->getImageUrl();
            if ($currentIMG && $currentIMG != 'miley.jpeg' && !preg_match("/^(post_([[:alnum:]]){14}\.)/", $currentIMG)) {

                fwrite($f, $currentIMG . "\r\n");


                // get ype
                $type = str_replace('.', '', strrchr($currentIMG, '.'));
                // generate new file name
                $newFileName = uniqid($this->post_prefix, true) . "." . $type;
                // move the file

                $file_path = $this->old_img_path . $currentIMG;
                $move = null;
                if (file_exists($file_path))
                    $move = copy($file_path, $path . $newFileName);

                if ($move) {
                    $post->setImageUrl($newFileName);
                    ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_MID . $newFileName, PostDAO::POST_IMG_MID_WSIZE);
                    ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_BIG . $newFileName, PostDAO::POST_IMG_BIG_WSIZE);
                } else {
                    //log message
                    $msg = "\r\nError: __FUNCTION__ File:  $this->old_img_path $currentIMG coulnd\'t be moved, id is:";
                    $post->setImageUrl(NULL);
                    $post->setPostType($postType);
                    fwrite($ourfileHandle, $msg);
                }
            }
        }
        fclose($f);
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();
        // close log file
        fclose($ourfileHandle);
    }

    /**
     * @Route("/move/ology", name="_move_ology_")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function move_ology_files() {
        $groupIcon = "styles/group_icon/public/";
        $groupIconLarge = "styles/group_icon_large/public/";
        $groupIconSmall = "styles/group_icon_small/public/";

        $path = $this->new_path . $this->img_dir . $this->ology_dir;

        $groupIcon_dest = $path . $this->ology_prefix . "round_medium/";
        $groupIconLarge_dest = $path . $this->ology_prefix . "round_large/";
        $groupIconSmall_dest = $path . $this->ology_prefix . "round_small/";

        if (!file_exists($groupIcon_dest))
            mkdir($groupIcon_dest, 0777, true);
        if (!file_exists($groupIconLarge_dest))
            mkdir($groupIconLarge_dest, 0777, true);
        if (!file_exists($groupIconSmall_dest))
            mkdir($groupIconSmall_dest, 0777, true);
        /*
          chmod($groupIcon_dest, 0777);
          chmod($groupIconLarge_dest, 0777);
          chmod($groupIconSmall_dest, 0777);
         */
        $em = $this->getDoctrine()->getEntityManager();
        $ologies = $em->getRepository('OlogySocialBundle:Ology')->findAll();
        // open log file
        $ourfileHandle = fopen($this->logPath, 'a');
        $f = fopen('/tmp/resizing_ology.log', 'a');
        // move all file in the db
        foreach ($ologies as $ology) {
            $currentIMG = $ology->getImageUrl();
            if ($currentIMG && $currentIMG != "mockingjay_0.jpg" && !preg_match("/^(ology_([[:alnum:]]){14}\.)/", $currentIMG)) {
                // get ype
                $type = str_replace('.', '', strrchr($currentIMG, '.'));
                fwrite($f, $currentIMG . "\r\n");
                // generate new file name
                $newFileName = uniqid($this->ology_prefix, true) . "." . $type;
                // move the file
                $file_path = $this->old_img_path . $currentIMG;
                $move = null;
                if (file_exists($file_path))
                    $move = copy($file_path, $path . $newFileName);

                // group icon
                $file_path = $this->old_img_path . $groupIcon . $currentIMG;

                if ($move) {
                    $ology->setImageUrl($newFileName);
                    ImagickService::roundUpImage($path . $newFileName, $groupIconSmall_dest . $newFileName, OlogyDAO::OLOGY_IMG_SMA_WSIZE);
                    ImagickService::roundUpImage($path . $newFileName, $groupIcon_dest . $newFileName, OlogyDAO::OLOGY_IMG_MID_WSIZE);
                    ImagickService::roundUpImage($path . $newFileName, $groupIconLarge_dest . $newFileName, OlogyDAO::OLOGY_IMG_BIG_WSIZE);
                } else {
                    //log message
                    $msg = "\r\nError: __FUNCTION__  File:  $this->old_img_path . $currentIMG coulnd't be moved, id is: " . $ology->getId();
                    fwrite($ourfileHandle, $msg);
                }
            }
        }
        fclose($f);
        // close log file
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();
        fclose($ourfileHandle);
    }

    /**
     * @Route("/move/post/audio", name="_move_post_")
     * @Template("OlogySocialBundle:Ology:import.html.twig")
     */
    public function move_post_audio_files() {

        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository('OlogySocialBundle:Post')->findAll();
        $postType = $em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
        // open log file
        $ourfileHandle = fopen($this->logPath, 'a');
        // move all file in the db
        foreach ($posts as $post) {
            $currentFile = $post->getAudioUrl();
            if ($currentFile) {
                // get ype
                $type = str_replace('.', '', strrchr($currentFile, '.'));
                // generate new file name
                $newFileName = uniqid($this->post_prefix, true) . "." . $type;
                // move the file
                $path = $this->old_audio_path . $currentFile;
                $move = null;

                if (file_exists($path))
                    $move = copy($path, $this->new_path . $this->audio_dir . $newFileName);
                // if move suceed
                if ($move)
                    $img->setAudioUrl($newFileName);
                else {
                    //log message
                    $msg = "\r\nError: " . __FUNCTION__ . ' File: ' . $this->old_audio_path . $currentFile . ' coulnd\'t be moved, id is:' . $post->getId();
                    $post->setImageUrl(NULL);
                    $post->setPostType($postType);
                    fwrite($ourfileHandle, $msg);
                }
            }
        }
        // close log file
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();
        fclose($ourfileHandle);
    }

}

?>
