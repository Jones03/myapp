<?php

namespace Pegasus\BlogBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogpostType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('Name','text',array('label' => 'name:','max_length' => 20))
        ->add('Comment','textarea',array('max_length' => 100))
        //->add('Category', new CategoryType(), array('label' => 'Category'));
        ->add('Category', 'entity', array(
               'multiple' => false,
               'property' => 'name',
               'class'    => 'PegasusBlogBundle:Category',
               'required' => true,
            ));
    }
    public function getName() {
        return 'Blogpost';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pegasus\BlogBundle\Entity\Blogpost',
            'cascade_validation' => true,
        ));
    }
}