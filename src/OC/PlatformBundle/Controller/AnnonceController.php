<?php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Annonce;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Image;
use OC\PlatformBundle\OCPlatformBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $annonce = $this->get('annonces');
        $test    = $annonce->tableau_annonces;

        return $this->render(
            'OCPlatformBundle:annonce:templateListe.html.twig',
            array('liste_annonces' => $test)
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

        $doctrine          = $this->getDoctrine();
        $em                = $doctrine->getManager();
        $repertoireAnnonce = $em->getRepository('OCPlatformBundle:Annonce');

        $annonce = $repertoireAnnonce->find($id_annonce);

        if ($annonce === null) {
            throw new NotFoundHttpException("L'annonce avec l'ID :".$id_annonce." n'existe pas");
        }

        $listecandidatures = $em
            ->getRepository('OCPlatformBundle:Application')
            ->findBy(array('annonce' => $id_annonce));

        return $this->render(
            'OCPlatformBundle:Annonce:templateAnnonce.html.twig',
            array(
                'listecandidatures' => $listecandidatures,
                'annonce'           => $annonce,
                'id_annonce_prev'   => $id_annonce_prev,
                'id_annonce_next'   => $id_annonce_next,
            )
        );
    }

    public function ajouterAction(Request $requete)
    {
        //création de l'entité Annonce
        $annonce = new Annonce();
        $annonce->setTitre('Nouvelle annonce ajoutée en base de données');
        $annonce->setAuteur('Auteur de la base de données');
        $annonce->setContenu('Description de la première annonce ajoutée en base de donnée !');

        //création de l'entité annonce 1
        $application1 = new Application();
        $application1->setAuteur('Auteur de la première candidature');
        $application1->setContenu('Contenu de la première candidature');

        //création de l'entité annonce 2
        $application2 = new Application();
        $application2->setAuteur('Auteur de la deuxième candidature');
        $application2->setContenu('Contenu de la deuxième candidature');

        //création de l'entité annonce 2
        $application3 = new Application();
        $application3->setAuteur('Auteur de la troisième candidature');
        $application3->setContenu('Contenu de la troisième candidature');

        //on lie les candidatures à l'annonce
        $application1->setAnnonce($annonce);
        $application2->setAnnonce($annonce);
        $application3->setAnnonce($annonce);

        //création de l'entité image
        $image = new Image();
        $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
        $image->setAlt('Job de reve alt');

        //on lie l'image à l'annonce
        $annonce->setImage($image);

        //récupération de l'entity manager + persistance et envoie en bdd (flush)
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        //persistance des candidatures puisque la relation n'est pas en cascade
        $em->persist($application1);
        $em->persist($application2);
        $em->persist($application3);
        $em->flush();


        if ($requete->isMethod('POST')) {
            $requete->getSession()->getFlashBag()->add('retour', 'Annonce bien enregistrée');

            return $this->redirectToRoute('oc_platform_voir', array($annonce->getId()));
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