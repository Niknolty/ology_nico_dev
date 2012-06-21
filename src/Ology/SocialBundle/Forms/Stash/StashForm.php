<?php

namespace Ology\SocialBundle\Forms\Stash;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StashForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('name')
                ->add('tagsStashes', 'text', array('label' => 'Ex: Music, traveling, design, sports, etc.'))
        ;
    }

    public function getName() {
        return 'ology_socialbundle_stashform';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Stash'
        );
    }

}

