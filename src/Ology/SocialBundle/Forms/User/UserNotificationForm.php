<?php

namespace Ology\SocialBundle\Forms\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserNotificationForm extends AbstractType {
 public function buildForm(FormBuilder $builder, array $options) {

        $builder->add('acceptsNotifNewCommentOwnPost', 'checkbox', array('label' => 'E-mail me when someone comments on a post I wrote','required' => false))
                ->add('acceptsNotifNewCommentOtherPost', 'checkbox', array('label' => 'E-mail me when someone comments on a post I commented on','required' => false))
                ->add('acceptsNotifNewMember', 'checkbox', array('label' => 'E-mail me when someone follows an ology I created','required' => false))
                ->add('acceptsNotifNewFollower', 'checkbox', array('label' => 'E-mail me when someone follows me','required' => false));
    }

    public function getName() {
        return 'userNotificationForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\User'
        );
    }
}
?>
