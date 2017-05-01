<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{
    public function voirAction($id_annonce)
    {
        $id_annonce_prev = $id_annonce - 1;
        $id_annonce_next = $id_annonce + 1;
        return $this->render('OCPlatformBundle:Annonce:voir.html.twig', array('id_annonce' => $id_annonce, 'id_annonce_prev' => $id_annonce_prev, 'id_annonce_next' => $id_annonce_next));
    }

    public function ajouterAction(Request $requete)
    {
        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien enregistrée');
            return $this->redirectToRoute('oc_platform_voir', array('id_annonce' => '5'));
        }
        return $this->render('OCPlatformBundle:Annonce:ajouter.html.twig');

    }

    public function editerAction ($id_annonce, Request $requete)
    {
        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien modifiée');
            return $this->redirectToRoute('oc_platform_voir', array('id_annonce' => $id_annonce));
        }
        return $this->render('OCPlatformBundle:Annonce:editer.html.twig', array('id_annonce' => $id_annonce));
    }

    public function supprimerAction($id_annonce)
    {
        return $this->render('OCPlatformBundle:Annonce:supprimer.html.twig', array('id_annonce' =>$id_annonce));
    }
}