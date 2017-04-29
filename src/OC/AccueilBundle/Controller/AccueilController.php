<?php

namespace OC\AccueilBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AccueilController extends Controller
{
    function BonjourAction()
    {
        $message = "Message d'accueil";
        $contenu = $this
        ->get('templating')
        ->render('OCAccueilBundle:Accueil:accueil.html.twig', array("nom" => $message));

        return new Response($contenu);

    }


}