<?php

namespace Ology\SocialBundle\Forms\Ology;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OlogyFormEdit extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('name', 'text')
                ->add('description', 'textarea')
                ->add('imageFile', 'file', array('required' => false))
                ->add('firstLabel', 'entity', array(
                        'class' => 'OlogySocialBundle:Label',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('l')->orderBy('l.name', 'ASC'); },
                        'property' => 'name'
                    ));
    }

    public function getName() {
        return 'ologyFormEdit';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Ology'
        );
    }
}

?>
