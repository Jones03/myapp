<?php

namespace Pegasus\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of TestController
 *
 * @author user
 */
class TestController extends Controller {

    public function indexAction() {
        return ($this->render('PegasusTestBundle:Test1:Test1.html.twig'));
    }

}