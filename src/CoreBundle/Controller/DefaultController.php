<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $listeAnnonces = $this->get('annonces');
        foreach ($listeAnnonces as $annonces) {
        }

        return $this->render('CoreBundle:Default:default.html.twig', array('annonces' => $annonces));
    }

    public function contactAction(Request $requete)
    {
        $requete->getSession()->getFlashBag()->add('contact', 'Pas encore de formulaire de contact disponible, revenez plus tard');
        return $this->redirectToRoute('core_accueil');

    }
}
