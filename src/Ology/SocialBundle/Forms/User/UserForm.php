<?php

namespace Ology\SocialBundle\Forms\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $sex = array('male' => 'Male', 'female' => 'Female');
        $day = array();
        for ($i = 1; $i <= 31; $i++) {
            $day[$i] = $i;
        }
        $month = array('1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December');
        $year = array();
        for ($i = 1920; $i <= 2012; $i++) {
            $year[$i] = $i;
        }
        $displayYear = array('label' => 'Display year', 'required' => false);
        $displayBday = array('label' => 'Display birthday', 'required' => false);


        $builder->add('firstName', 'text', array('required' => true))
                ->add('lastName', 'text', array('required' => true))
                ->add('email', 'text', array('required' => true))
                ->add('doNotEmail', 'checkbox', array('required' => false))
                ->add('changePassword', 'password', array('required' => false))
                ->add('confirmChangePassword', 'password', array('required' => false))
                ->add('bdayDay', 'choice', array('choices' => $day, 'required' => false))
                ->add('bdayMonth', 'choice', array('choices' => $month, 'required' => false))
                ->add('bdayYear', 'choice', array('choices' => $year, 'required' => false))
                ->add('displayYear', 'checkbox', $displayYear)
                ->add('displayBday', 'checkbox', $displayBday)
                ->add('sex', 'choice', array('choices' => $sex, 'required' => false))
                ->add('occupation', 'text', array('required' => false))
                ->add('location', 'text', array('required' => false))
                ->add('summary', 'textarea', array('required' => false))
                ->add('top1', 'text', array('required' => false))
                ->add('top2', 'text', array('required' => false))
                ->add('top3', 'text', array('required' => false))
                ->add('website1', 'text', array('required' => false))
                ->add('website2', 'text', array('required' => false))
                ->add('website3', 'text', array('required' => false))
                ->add('imageFile', 'file', array('required' => false))
                ->add('editorTitle', 'text', array('required' => false))
                ->add('editorTwitterId', 'text', array('required' => false))
                ->add('mainChannel', 'entity', array(
                        'class' => 'OlogySocialBundle:Channel',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('c')->orderBy('c.name', 'ASC'); },
                        'property' => 'name'));
    }

    public function getName() {
        return 'userForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\User'
        );
    }

}

?>
