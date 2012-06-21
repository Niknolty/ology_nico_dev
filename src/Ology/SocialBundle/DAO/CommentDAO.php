<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\DAO\NotificationDAO;

class CommentDAO {

    protected $em;
    protected $notificationDAO;

    function __construct(EntityManager $em, NotificationDAO $notificationDAO) {
        $this->em = $em;
        $this->notificationDAO = $notificationDAO;
    }

    public function createComment($authorId, $postId, $content, $parentComment = NULL) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('CommentDAO: No post found for id ' . $postId);

        if (empty($content))
            return;
        
        $comment = new Comment();
        $comment->setPost($post);
        $comment->setAuthor($author);
        $comment->setContent($content);
        $comment->setTimesCommented(0);

        if ($parentComment != NULL)
            $comment->setParentComment ($parentComment);
        // @TODO increment timescommented on parentComment

        $this->em->persist($comment);

        $post->incrTimeCommented();
        $this->em->persist($post);

        $this->em->flush();
        return $comment;
    }

    public function updateComment($commentId, $postId, $content, $parentComment) {
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $comment = $this->em->getRepository('OlogySocialBundle:Comment')->find($commentId);

        if (!$comment)
            throw new DAOException('No comment found for id ' . $commentId);

        $comment->update($post, $comment->getAuthor(), $content, $parentComment);
        $this->em->flush();

        return $comment;
    }

    public function getComment($commentId) {
        $comment = $this->em->getRepository('OlogySocialBundle:Comment')->find($commentId);
        if (!$comment)
            throw new DAOException('No comment found for id ' . $commentId);
        return $comment;
    }

    function deleteComment($commentId) {
        $res = $this->deleteCommentFather($commentId);
        
        $this->em->flush();

        return $res;
    }

    private function deleteCommentFather($commentId) {
        $comment = $this->em->getRepository('OlogySocialBundle:Comment')->find($commentId);

        if (!$comment)
            return false;
        // @TODO decrement timescommented on parentComment
        $this->notificationDAO->deleteNotificationForComment($commentId);
        $comment->getPost()->decrTimeCommented();
        $this->deleteCommentSons($commentId);

        $this->em->remove($comment);
        return true;
    }

    private function deleteCommentSons($commentId) {
        $comment = $this->em->getRepository('OlogySocialBundle:Comment')
                ->findBy(array('parentComment' => $commentId));

        if (sizeof($comment) > 0) {
            foreach ($comment as $commentSon) {
                $postId = $this->deleteComment($commentSon->getId());
            }
        }
    }

    function getCommentForPost($postId, $n, $offset) {
        $comments = $this->em->getRepository('OlogySocialBundle:Comment')
                ->findBy(array('post' => $postId), array('creationDate' => 'asc'), $n, $offset);

        return $comments;
    }

    function getCommentsForPost($postId) {
        $comments = $this->em->getRepository('OlogySocialBundle:Comment')
                ->findBy(array('post' => $postId));
        return $comments;
    }

    function getCommentForUser($userId, $n, $offset) {
        $comments = $this->em->getRepository('OlogySocialBundle:Comment')
                ->findBy(array('author' => $userId), array('creationDate' => 'desc'), $n, $offset);

        return $comments;
    }
    
    function getNumberOfCommentsOnPostForUser($userId, $postId) {
        $query = $this->em->createQueryBuilder()
                    ->add('select', 'count (c) as total')
                    ->from('OlogySocialBundle:Comment', 'c')
                    ->where('c.author = ?1 AND c.post = ?2')
                    ->getQuery();

        $query->setParameter(1, $userId);
        $query->setParameter(2, $postId);
        $array = $query->getResult();
        
        if (count($array) == 0)
            return 0;
        return $array[0]['total'];
    }

}

?>
