<?php

namespace Pegasus\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Pegasus\TestBundle\Entity\Task;

/**
 * Description of DefaultController
 *
 * @author user
 */
class DefaultController extends Controller {

    public function indexAction() {
        return new Response('Hello world!');
    }
    
    public function newAction(){
        //http://symfony.com/doc/current/book/forms.html
        $task = new Task();
        $task->setTask('Build a blog with symfony2');
        $task->setDueDate(new \DateTime('tomorrow'));
        
        $form = $this->createForm($task);
        $form->add('task','text');
        $form->add('dueDate','date');
        $form->getForm();
        
        return $this->render('PegasusTestBundle:default:new.html.twig',array('form' => $form->createView(),));
    }

}