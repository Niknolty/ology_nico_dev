<?php

namespace Ology\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegistrationFormType extends AbstractType {

    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class) {
        $this->class = $class;
    }

    public function buildForm(FormBuilder $builder, array $options) {

        // add your custom field
        $builder->add('email', 'email', array('label' => 'Email'))
                ->add('plainPassword', 'repeated', array('type' => 'password', 'first_name' => 'Password', 'second_name' => 'Confirm Password'))
                ->add('firstName', 'text', array('label' => 'First Name')) 
                ->add('lastName', 'text', array('label' => 'Last Name'))
                ->add('termOfService', 'checkbox', array('label' => ' '));
    }

    public function getDefaultOptions(array $options) {
        return array('data_class' => $this->class);
    }

    public function getName() {
        return 'ology_user_registration';
    }
}

?>
