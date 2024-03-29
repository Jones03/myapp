<?php

namespace Pegasus\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Pegasus\TestBundle\Entity\Task;
use Pegasus\TestBundle\Form\Type\TaskType;

/**
 * Description of DefaultController
 *
 * @author user
 */
class DefaultController extends Controller {

    public function indexAction() {
        return new Response('Hello world!');
    }
    
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        
        $form = $this->createForm(new TaskType(),$task);
        
        if ($request->isMethod('POST')){
            $form->bind($request);
        
        
            if ($form->isValid()){
                return $this->redirect($this->generateUrl('_test1'));
            }else{
                throw new \Exception('Form is not valid');
            }
        }else if($request->isMethod('GET')){
                    return $this->render('PegasusTestBundle:Default:new.html.twig', array(
            'form' => $form->createView(),));
        }
        
    }

}