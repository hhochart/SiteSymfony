<?php
// src/AppBundle/Controller/NombreRdController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class NombreRdController
{
    /**
     * @Route("/nombrealeatoire")
     */

    public function numberAction()  /*Génération de nombre aléatoire*/
    {
        $nombre = mt_rand(0, 100);

        return new Response(
            '<html><body><div style="background-color: red; color: white;">Lucky Number: ' . $nombre . '</div></body></html>'
        );
    }
}