<?php

namespace Ology\SocialBundle\Forms\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MergedUserForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        
        $builder->add('email', 'text', array('required' => true))
                ->add('plainPassword', 'password', array('required' => true, 'label' => 'Password'));
    }

    public function getName() {
        return 'mergedUserForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\User'
        );
    }
}

?>
