<?php

namespace Ology\SocialBundle\Forms\Registration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TwitterMergeForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        
        $builder->add('plainPassword', 'password', array('required' => true, 'label' => 'Password'));
    }

    public function getName() {
        return 'twitterMergeForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\User'
        );
    }
}

?>
