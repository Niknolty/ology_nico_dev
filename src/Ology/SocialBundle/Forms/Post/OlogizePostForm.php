<?php

namespace Ology\SocialBundle\Forms\Post;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OlogizePostForm extends AbstractType {
    protected $user;
    
    function __construct(User $user = NULL) {
        $this->user = $user;
    }
    
    public function buildForm(FormBuilder $builder, array $options) {
        $user = $this->user;
        $builder->add('title', 'text', array('label' => ' '))
                ->add('textContent', 'textarea', array('label' => ' '))
                ->add('imageUrl', 'hidden')
                ->add('imageSourceUrl', 'hidden')
                ->add('postTypeId', 'hidden');
        
        if ($this->user != NULL) {
            $user = $this->user;
            $builder->add('firstOlogy', 'entity', array(
                        'empty_value' => 'Select An Ology',
                        'class' => 'OlogySocialBundle:Ology',
                        'query_builder' => function($repository) use ($user) { 
                            $result = $repository->createQueryBuilder('o')
                                    ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                                    ->orderBy('m.creationDate', 'DESC')
                                    ->setParameter(1, $user)
                                    ->orderBy('o.name', 'ASC'); 
                            return $result;
                            
                            },
                        'label' => ' ',
                        'property' => 'name',
                                    //'error_bubbling' => FALSE,
                         ));
        } else {
            $builder->add('firstOlogyId', 'hidden');
        }
    }

    public function getName() {
        return 'postForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Post'
        );
    }
}

?>
