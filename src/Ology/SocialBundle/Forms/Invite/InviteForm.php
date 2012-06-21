<?php

namespace Ology\SocialBundle\Forms\Invite;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class InviteForm extends AbstractType {
    protected $user;
    
    function __construct(User $user = NULL) {
        $this->user = $user;
    }
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('email1', 'text', array('label' => ' '));
        $builder->add('email2', 'text', array('required' => false, 'label' => ' '));
        $builder->add('email3', 'text', array('required' => false, 'label' => ' '));
        $builder->add('email4', 'text', array('required' => false, 'label' => ' '));
        $builder->add('email5', 'text', array('required' => false, 'label' => ' '));
        $builder->add('email6', 'text', array('required' => false, 'label' => ' '));
        $builder->add('msg', 'textarea', array('label' => ' '));
        
        $user = $this->user;
        $builder->add('ologyId', 'entity', array(
                    'class' => 'OlogySocialBundle:Ology',
                    'query_builder' => function($repository) use ($user) { 
                        return $repository->createQueryBuilder('o')
                                ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                                ->orderBy('m.creationDate', 'DESC')
                                ->setParameter(1, $user)
                                ->orderBy('o.name', 'ASC');
                        },
                    'label' => ' ',
                    'required' => true,
                    'property' => 'name'));
    }

    public function getName() {
        return 'inviteForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Forms\Invite\InviteList'
        );
    }
}

?>
