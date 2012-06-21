<?php

namespace Ology\SocialBundle\Forms\Post;

use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfessionalPostForm extends AbstractType {
    protected $user;
    
    function __construct(User $user = NULL) {
        $this->user = $user;
    }
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('htmlTitle', 'text')
                ->add('metaTitle', 'text', array('required' => false))
                ->add('imageFile', 'file', array('required' => false))
                ->add('citeTitle', 'text', array('required' => false))
                ->add('citeUrl', 'text', array('required' => false))
                ->add('citeImage', 'file', array('required' => false))
                ->add('imageFile', 'file', array('required' => false))
                ->add('image1File', 'file', array('required' => false))
                ->add('image2File', 'file', array('required' => false))
                ->add('imageCaption', 'text', array('required' => false))
                ->add('imageAltText', 'text', array('required' => false))
                ->add('summary', 'textarea', array('required' => false))
                ->add('htmlContent', 'textarea', array('required' => false))
                ->add('tags', 'text', array('required' => false))
                ->add('metaKeywords', 'text', array('required' => false))
                ->add('metaDescription', 'text', array('required' => false))
                ->add('isDraft', 'hidden', array('required' => false))
                ->add('id', 'hidden', array('required' => false))
                ->add('scheduledPublish', 'hidden', array('required' => false))
                ->add('movieDirector', 'text', array('required' => false))
                ->add('movieStarring', 'text', array('required' => false))
                ->add('movieOpeningDate', 'text', array('required' => false))
                ->add('movieRuntime', 'text', array('required' => false))
                ->add('albumArtist', 'text', array('required' => false))
                ->add('albumTitle', 'text', array('required' => false))
                ->add('albumLabel', 'text', array('required' => false))
                ->add('isPostPublishEdit', 'hidden', array('required' => false))
                ->add('albumReleaseDate', 'text', array('required' => false));
        
        $builder->add('channelposts', 'entity', array(
                        'class' => 'OlogySocialBundle:Channel',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('c')->orderBy('c.name', 'ASC'); },
                        'property' => 'name',
                        'expanded' => true,
                        'multiple' => true
        ));
        
        $builder->add('postType', 'entity', array(
                        'class' => 'OlogySocialBundle:PostType',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('t')->orderBy('t.id', 'ASC'); },
                        'property' => 'name'
        ));
                        
        $builder->add('rating', 'entity', array(
                        'class' => 'OlogySocialBundle:Rating',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('r')->orderBy('r.id', 'ASC'); },
                        'property' => 'name'
        ));
                        
        $builder->add('movieGenre', 'entity', array(
                        'class' => 'OlogySocialBundle:Genre',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('g')->orderBy('g.name', 'ASC'); },
                        'property' => 'name'
        ));
                        
        $builder->add('movieParentalRating', 'entity', array(
                        'class' => 'OlogySocialBundle:ParentalRating',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('r')->orderBy('r.id', 'ASC'); },
                        'property' => 'name'
        ));
        
        $builder->add('firstChannel', 'entity', array(
                        'class' => 'OlogySocialBundle:Channel',
                        'query_builder' => function($repository) { return $repository->createQueryBuilder('c')->orderBy('c.name', 'ASC'); },
                        'property' => 'name',
                        'required' => false
        ));
                        
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
                        'label' => 'Ology',
                        'property' => 'name'));
        } else {
            $builder->add('firstOlogyId', 'hidden');
        }
    }

    public function getName() {
        return 'professionalPostForm';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ology\SocialBundle\Entity\Post'
        );
    }
}

?>
