<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PlatformController extends Controller
{
    public function IndexAction($page)
    {
        if ($page < 1) {
            throw new NotFoundHttpException('Page ' . $page . 'inexistante');
        }
        $message = "Bienvenue sur le site d'annonces";
        return $this->render('OCPlatformBundle:accueil:accueil.html.twig', array('content' => $message));
    }

}