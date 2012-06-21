<?php

namespace Ology\SocialBundle\Forms\Post;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PostForm extends AbstractType {

    protected $user;

    function __construct(User $user = NULL) {
        $this->user = $user;
    }

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('title', 'text')
                ->add('textContent', 'textarea', array('label' => ' '))
                ->add('imageFile', 'file', array('required' => false))
                ->add('imageUrl', 'hidden', array('required' => false))
                ->add('videoUrl', 'text', array('required' => false))
                ->add('audioFile', 'file', array('required' => false))
                ->add('postTypeId', 'hidden');

        if ($this->user != NULL) {
            $user = $this->user;
            $builder->add('firstOlogy', 'entity', array(
                'class' => 'OlogySocialBundle:Ology',
                'query_builder' => function($repository) use ($user) {
                    return $repository->createQueryBuilder('o')
                            ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                            ->orderBy('m.creationDate', 'DESC')
                            ->setParameter(1, $user)
                            ->orderBy('o.name', 'ASC');
                },
                'label' => ' ',
                'property' => 'name'));
              
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
