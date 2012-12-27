<?php

namespace Pegasus\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Pegasus\BlogBundle\Entity\Blogpost;
use Pegasus\BlogBundle\Entity\Category;
use Pegasus\BlogBundle\Form\Type\BlogPostType;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('PegasusBlogBundle:Default:index.html.twig');
    }
    public function newAction(Request $request)
    {
        //add categories: http://symfony.com/doc/current/book/forms.html#embedded-forms
        $blogPost = new blogpost;
        $form = $this->createForm(New BlogpostType(), $blogPost);
        if ($request->isMethod("POST")){         
            $form->bind($request);
            if ($form->isValid()){
                $this->get('session')->setFlash(
                        'notice',
                        'Your post has been submitted'
                        );
                $em = $this->getDoctrine()->getManager();
                $em->persist($blogPost);
                $em->flush();
                return $this->redirect($this->generateurl('_show_posts'));
            } else {
                throw new \Exception('form is not valid');
            }
        }else if ($request->isMethod("GET")) {
            return $this->render('PegasusBlogBundle::New.html.twig', array('form' => $form->createView(),));
        }else {
            throw new \Exception('no method in request');
        }
    }
    
    public function showAction()
    {
        $blogposts = $this->getDoctrine()->getRepository('PegasusBlogBundle:Blogpost')->findAll();
        if (!$blogposts){
            $this->get('session')->setFlash('notice','no posts to display');
        }
        
        return $this->render('PegasusBlogBundle::list.html.twig',array('blogposts' => $blogposts,));
    }
}
