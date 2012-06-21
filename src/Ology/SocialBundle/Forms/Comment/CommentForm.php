<?php

namespace Ology\SocialBundle\Forms\Comment;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentForm extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('content','textarea', array('label' => ' '))
                ->add('postId', 'hidden');
    }

    public function getName() {
        return 'commentForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Comment'
        );
    }
}

?>
