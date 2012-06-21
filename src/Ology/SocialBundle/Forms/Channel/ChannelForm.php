<?php

namespace Ology\SocialBundle\Forms\Channel;

use Doctrine\ORM\Query\Expr\Join;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ChannelForm extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('ad1', 'textarea', array('required' => false, 'label' => '728x90 Top'))
                ->add('ad2', 'textarea', array('required' => false, 'label' => '300 x 250 Right Panel - Top'))
                ->add('ad3', 'textarea', array('required' => false, 'label' => '300 x 250 Right Panel - Bottom'))
                ->add('ad4', 'textarea', array('required' => false, 'label' => 'Left wallpaper'))
                ->add('ad5', 'textarea', array('required' => false, 'label' => 'Right wallpaper'))
                ->add('ad6', 'textarea', array('required' => false, 'label' => 'Pencil pushdown'))
                ->add('ad0', 'textarea', array('required' => false, 'label' => 'Brand Logo'))
                ->add('video', 'textarea', array('required' => false, 'label' => 'Video Ad'))
                ->add('featuredPost1id', 'text', array('required' => false))
                ->add('featuredPost2id', 'text', array('required' => false))
                ->add('featuredPost3id', 'text', array('required' => false))
                ->add('featuredPost4id', 'text', array('required' => false))
                ->add('featuredPost5id', 'text', array('required' => false))
                ->add('specialTitle', 'text', array('required' => false))
                ->add('specialPost1id', 'text', array('required' => false))
                ->add('specialPost2id', 'text', array('required' => false))
                ->add('specialPost3id', 'text', array('required' => false))
                ->add('stub', 'hidden', array('required' => false));
    }

    public function getName() {
        return 'channelForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Channel'
        );
    }
}

?>
