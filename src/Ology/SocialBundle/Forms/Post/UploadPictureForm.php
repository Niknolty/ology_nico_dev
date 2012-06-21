<?php

namespace Ology\SocialBundle\Forms\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UploadPictureForm extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('picture', 'file', array('required' => false));
    }

    public function getName() {
        return 'pictureForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Forms\Post\Pictures'
        );
    }
}

?>
