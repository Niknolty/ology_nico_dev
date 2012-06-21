<?php

namespace Ology\SocialBundle\Forms\Stat;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OlogyForm extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('firstOlogy', 'entity', array(
                        'class' => 'OlogySocialBundle:Ology',
                        'query_builder' => function($repository) { 
                            return $repository->createQueryBuilder('o')
                                    ->orderBy('o.name', 'ASC');
                            },
                        'label' => 'Ology',
                        'property' => 'name'));
    }

    public function getName() {
        return 'ologyForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Post'
        );
    }
}

?>
