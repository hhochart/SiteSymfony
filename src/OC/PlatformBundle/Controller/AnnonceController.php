<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{

    public function menuAction($limit)
    {

        $listeAnnonces = array(
            array('id_annonce' => 2, 'titre' => 'Recherche d\'un développeur web Symfony'),
            array('id_annonce' => 5, 'titre' => 'Mission pour grahpiste sous Zend'),
            array('id_annonce' => 7, 'titre' => 'Refonte d\un site e-commerce Magento'),
            array('id_annonce' => 16, 'titre' => 'Recherche d\'un développeur web Wordpress'),
        );

        return $this->render(
            'OCPlatformBundle:Annonce:templateMenu.html.twig',
            array('liste_Annonces' => $listeAnnonces)
        );
    }

    public function listeAction($page)
    {
        $listeAnnonces = array(
            array(
                'id_annonce'  => 2,
                'titre'       => 'Recherche d\'un développeur web Symfony',
                'auteur'      => 'Jean',
                'description' => 'description de l\'annonce pour le dev web symfony',
                'date'        => new \Datetime(),
            ),
            array(
                'id_annonce'  => 5,
                'titre'       => 'Mission pour grahpiste sous Zend',
                'auteur'      => 'Thierry',
                'description' => 'description de l\'annonce pour le graphiste travaillant sur Zend',
                'date'        => new \Datetime(),
            ),
            array(
                'id_annonce'  => 7,
                'titre'       => 'Refonte d\un site e-commerce Magento',
                'auteur'      => 'Francis',
                'description' => 'description de l\'annonce pour le site e-commerce magento',
                'date'        => new \Datetime(),
            ),
            array(
                'id_annonce'  => 16,
                'titre'       => 'Recherche d\'un développeur web Wordpress',
                'auteur'      => 'Rogeay',
                'description' => 'description de l\'annonce pour le développement d\'un plugin Wordpress',
                'date'        => new \Datetime(),
            ),
        );

        return $this->render(
            'OCPlatformBundle:annonce:templateListe.html.twig',
            array('liste_annonces' => $listeAnnonces)
        );
    }

    public function voirAction($id_annonce)
    {
        if ($id_annonce > 1) {
            $id_annonce_prev = $id_annonce - 1;
        } else {
            $id_annonce_prev = 1;
        }
        $id_annonce_next = $id_annonce + 1;

        $annonce = array(
            'id_annonce'  => 2,
            'titre'       => 'Recherche d\'un développeur web Symfony',
            'auteur'      => 'Jean',
            'description' => 'description de l\'annonce pour le dev web symfony',
            'date'        => new \Datetime(),
        );

        return $this->render(
            'OCPlatformBundle:Annonce:templateAnnonce.html.twig',
            array(
                'annonce'         => $annonce,
                'id_annonce_prev' => $id_annonce_prev,
                'id_annonce_next' => $id_annonce_next,
            )
        );
    }

    public function ajouterAction(Request $requete)
    {
        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien enregistrée');

            return $this->redirectToRoute('oc_platform_voir', array('id_annonce' => '5'));
        }

        return $this->render('OCPlatformBundle:Annonce:templateAjouter.html.twig');

    }

    public function editerAction($id_annonce, Request $requete)
    {
        $annonce = array(
            'id_annonce'  => 2,
            'titre'       => 'Recherche d\'un développeur web Symfony',
            'auteur'      => 'Jean',
            'description' => 'description de l\'annonce pour le dev web symfony',
            'date'        => new \Datetime(),
        );

        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien modifiée');

            return $this->redirectToRoute('oc_platform_voir', array('id_annonce' => $id_annonce));
        }

        return $this->render('OCPlatformBundle:Annonce:templateEditer.html.twig', array('annonce' => $annonce));
    }

    public function supprimerAction($id_annonce, Request $requete)
    {
        $annonce = array(
            'id_annonce'  => 2,
            'titre'       => 'Recherche d\'un développeur web Symfony',
            'auteur'      => 'Jean',
            'description' => 'description de l\'annonce pour le dev web symfony',
            'date'        => new \Datetime(),
        );

        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien supprimée');

            return $this->redirectToRoute('oc_platform_voir', array('id_annonce' => $id_annonce));
        }

        return $this->render('OCPlatformBundle:Annonce:templateSupprimer.html.twig', array('annonce' => $annonce));

    }
}