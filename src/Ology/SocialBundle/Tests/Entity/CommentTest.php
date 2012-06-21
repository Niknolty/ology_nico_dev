<?php

namespace Ology\SocialBundle\Tests\Entity;

use Ology\SocialBundle\Entity\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    public function testCommentCreation()
    {
        $comment = new Comment();
        $comment->setPostId('3');
        $this->assertEquals('3', $comment->getPostId());
    }
    
    public function testCommentCreation2()
    {
        $comment = new Comment();
        $comment->setPostId('2');
        $this->assertEquals('2', $comment->getPostId());
    }
    
    public function testCommentCreation3()
    {
        $comment = new Comment();
        $comment->setPostId('5');
        $this->assertEquals('2', $comment->getPostId());
    }
}

?>
