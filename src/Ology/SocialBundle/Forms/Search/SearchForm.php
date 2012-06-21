<?php

namespace Ology\SocialBundle\Forms\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SearchForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('search', 'text', array('label' => ' '))
                ->add('type', 'hidden');
    }

    public function getName() {
        return 'searchForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Forms\Search\Search'
        );
    }
}

?>
