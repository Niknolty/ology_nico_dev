<?php

namespace Ology\SocialBundle\Forms\Registration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TwitterRegistrationForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('email', 'email', array('required' => true));
    }

    public function getName() {
        return 'twitterRegistrationForm';
    }

}

?>
