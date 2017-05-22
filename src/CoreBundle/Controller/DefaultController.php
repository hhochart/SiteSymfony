<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $listeAnnonces = $this->get('annonces');
        foreach ($listeAnnonces as $annonces) {
        }

        return $this->render('CoreBundle:Default:default.html.twig', array('annonces' => $annonces));
    }
}
