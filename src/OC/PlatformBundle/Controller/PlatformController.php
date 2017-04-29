<?php
/**
 * Created by PhpStorm.
 * User: Herve
 * Date: 29/04/2017
 * Time: 00:19
 */

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\OCPlatformBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlatformController extends Controller
{
    public function AccueilAction()
    {
        $message = "Contenu à venir";
        $contenu = $this
            ->get('templating')
            ->render('OCPlatformBundle:Accueil:accueil.html.twig', array('content' => $message));

        return new Response($contenu);
    }
}