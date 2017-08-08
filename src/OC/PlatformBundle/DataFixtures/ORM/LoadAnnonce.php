<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadAnnonce.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Annonce;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Image;
use OC\PlatformBundle\Entity\AnnonceCompetence;

class LoadAnnonce extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $objectManager)
    {
        $tableauxAnnonces = [
            [
                'Développeur Symfony',
                'Jean',
                'Recherche un développeur Symfony afin de mettre en place un platforme de vente en ligne',
                'https://symfony.3wa.fr/web/images/symfony_black_03.png',
                'DevSymfony',
                [
                    ['Marc', 'Première offre concernant l\'annonce de développeur symfony'],
                    ['Thierry', 'Je propose mon expertise sur symfony afin de mener à bien le projet'],
                    ['Antoine', '3ans d\expérience sur Symfony'],
                ],
            ],
            [
                'Intégrateur Front-end Angular',
                'Valentin',
                'Réalisation d\une SPA pour un site vitrine',
                'https://avatars0.githubusercontent.com/u/139426?v=4&s=200',
                'AngularJS',
                [
                    ['Marc', 'Seconde offre conernant la réalisation d\un site one page avec angularJS'],
                    ['Thomas', 'Première experience sur Angular et React concluante'],
                    ['Auteur6', 'Contenu6'],
                ],
            ],
            [
                'Intégrateur Front-end Angular',
                'Valentin',
                'Réalisation d\une SPA pour un site vitrine',
                'https://avatars0.githubusercontent.com/u/139426?v=4&s=200',
                'AngularJS',
                [
                    ['Marc', 'Seconde offre conernant la réalisation d\un site one page avec angularJS'],
                    ['Thomas', 'Première experience sur Angular et React concluante'],
                    ['Auteur6', 'Contenu6'],
                ],
            ],
            [
                'Intégrateur Front-end Angular',
                'Valentin',
                'Réalisation d\une SPA pour un site vitrine',
                'https://avatars0.githubusercontent.com/u/139426?v=4&s=200',
                'AngularJS',
                [
                    ['Marc', 'Seconde offre conernant la réalisation d\un site one page avec angularJS'],
                    ['Thomas', 'Première experience sur Angular et React concluante'],
                    ['Auteur6', 'Contenu6'],
                ],
            ],
            [
                'Intégrateur Front-end Angular',
                'Valentin',
                'Réalisation d\une SPA pour un site vitrine',
                'https://avatars0.githubusercontent.com/u/139426?v=4&s=200',
                'AngularJS',
                [
                    ['Marc', 'Seconde offre conernant la réalisation d\un site one page avec angularJS'],
                    ['Thomas', 'Première experience sur Angular et React concluante'],
                    ['Auteur6', 'Contenu6'],
                ],
            ],
            [
                'Derniere Annonce',
                'Valentin',
                'Réalisation d\une SPA pour un site vitrine',
                'https://avatars0.githubusercontent.com/u/139426?v=4&s=200',
                'AngularJS',
                [
                    ['Marc', 'Seconde offre conernant la réalisation d\un site one page avec angularJS'],
                    ['Thomas', 'Première experience sur Angular et React concluante'],
                    ['Auteur6', 'Contenu6'],
                ],
            ],
        ];

        foreach ($tableauxAnnonces as $tableauxAnnonce) {
            //Annonce 1
            $annonce = new Annonce();
            $annonce->setTitre($tableauxAnnonce[0]);
            $annonce->setAuteur($tableauxAnnonce[1]);
            $annonce->setContenu($tableauxAnnonce[2]);

            //Image annonce 1
            $image = new Image();
            $image->setUrl($tableauxAnnonce[3]);
            $image->setAlt($tableauxAnnonce[4]);
            $annonce->setImage($image);


            $competences = $objectManager->getRepository('OCPlatformBundle:Competence')->findAll();
            foreach ($competences as $competence) {
                $annonceCompetence = new AnnonceCompetence();
                $annonceCompetence->setCompetence($competence);
                $annonceCompetence->setAnnonce($annonce);
                $annonceCompetence->setNiveau('Expert');
                $objectManager->persist($annonceCompetence);
            }

            //création de l'entité annonce 1
            $application = new Application();
            foreach ($tableauxAnnonce[5] as $tableauApplication) {
                $application->setAuteur($tableauApplication[0]);
                $application->setContenu($tableauxAnnonce[2]);
                $application->setAnnonce($annonce);
            }

            $categories = $objectManager->getRepository('OCPlatformBundle:Categorie')->findAll();
            foreach ($categories as $categorie) {
                $annonce->addCategories($categorie);
            }
            //récupération de l'entity manager + persistance et envoie en bdd (flush)
            $objectManager->persist($annonce);
            //persistance des candidatures puisque la relation n'est pas en cascade
            $objectManager->persist($application);
            $objectManager->flush();
        }
    }

    public function getOrder()
    {
        return 3;
    }
}