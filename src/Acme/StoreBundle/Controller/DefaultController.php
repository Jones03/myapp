<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Product;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function createAction(){
        $product = new product();
        $product->setName('Cote du bla');
        $product->setPrice('19.22');
        $product->setDescription('Lorem Ipsum Dolor Amet');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        
        return new Response ('Created product id '.$product->getId());
    }
    
    public function showAction($id){
        $repo = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product');
        $product = $repo->find($id);
        //testing out selfwritten query in custom repo
        $products = $repo->findAndOrderByName();
            if (!$product || !$products){
                throw $this->createNotFoundException(
                        'No product for id '.$id
                        );
            }
            return new Response ($products[0]->getName());
    }
}
