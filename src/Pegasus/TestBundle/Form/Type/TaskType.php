<?php

namespace Pegasus\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('task','text',array('label' => 'task here'));
        $builder->add('dueDate','date',array('widget' => 'single_text'));
    }
    public function getName(){
        return 'task';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pegasus\TestBundle\Entity\Task',
        ));
    }
}