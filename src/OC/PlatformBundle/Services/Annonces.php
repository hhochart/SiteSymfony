<?php


namespace OC\PlatformBundle\Services;


class Annonces
{
    public function __construct()
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
    }
}