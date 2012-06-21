<?php

namespace Ology\SocialBundle\Forms\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ImagePostForm extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('title', 'text')
                ->add('textContent', 'text')
                ->add('imageFile', 'file')
                ->add('firstOlogyId', 'hidden');
    }

    public function getName() {
        return 'imagePostForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Post'
        );
    }
}

?>
