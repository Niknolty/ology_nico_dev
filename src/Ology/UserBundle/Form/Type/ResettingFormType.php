<?php

namespace Ology\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ResettingFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('new', 'repeated', array('type' => 'password', 'first_name' => 'Password', 'second_name' => 'Confirm Password'));
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'FOS\UserBundle\Form\Model\ResetPassword');
    }

    public function getName()
    {
        return 'ology_user_resetting';
    }
}
