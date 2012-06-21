<?php

namespace Ology\SocialBundle\Forms\Ology;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FeaturedOlogiesForm extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('list', 'text');
    }

    public function getName() {
        return 'featuredOlogiesForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\FeaturedOlogy'
        );
    }
}

?>
