<?php

namespace Ology\SocialBundle\Forms\Post;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ReOlogizePostForm extends AbstractType {
    protected $user;
    
    function __construct(User $user) {
        $this->user = $user;
    }
    
    public function buildForm(FormBuilder $builder, array $options) {
        $user = $this->user;
        $builder->add('comment', 'text', array('label' => 'Add your own thoughts to the post...'));
        $builder->add('stashes', 'entity', array(
            'class' => 'OlogySocialBundle:Stash',
            'query_builder' => function($repository) use ($user) {
                return $repository->createQueryBuilder('u')
                        ->where('u.founder = ?1')
                        ->setParameter(1, $user)
                        ->orderBy('u.name', 'ASC');
            },
            'multiple' => true,
            'expanded' => false,
            'label' => ' ',
            'required' => false,
            'property' => 'name'));
            
        $builder->add('ologies', 'entity', array(
                'class' => 'OlogySocialBundle:Ology',
                'query_builder' => function($repository) use ($user) {
                    return $repository->createQueryBuilder('o')
                            ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                            ->orderBy('m.creationDate', 'DESC')
                            ->setParameter(1, $user)
                            ->orderBy('o.name', 'ASC');
                },
                'multiple' => true,
                'expanded' => false,
                'label' => ' ',
                'required' => false,
                'property' => 'name'));
    }

    public function getName() {
        return 'ReOlogizePostForm';
    }
    
    public function getParent(array $options)
    {
        return 'choice';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\PostsStashes',
        );
    }
}

?>
