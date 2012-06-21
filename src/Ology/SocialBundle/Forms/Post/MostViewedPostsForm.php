<?php

namespace Ology\SocialBundle\Forms\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MostViewedPostsForm extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('list', 'text');
    }

    public function getName() {
        return 'mostViewedPostsForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\MostViewedPost'
        );
    }
}

?>
