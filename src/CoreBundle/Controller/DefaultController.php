<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $test = $this->get('annonces');
        var_dump($test);
        return $this->render('CoreBundle:Default:default.html.twig', array('annonces' => $test));
    }
}
