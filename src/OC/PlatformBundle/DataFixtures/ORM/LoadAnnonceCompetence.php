<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Competence;

class LoadAnnonceCompetence implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            'PHP',
            'HTML',
            'CSS',
            'Angular',
            'Unix'
        );

        foreach ($names as $name) {
            // On crée la catégorie
            $competence = new Competence();
            $competence->setName($name);

            // On la persiste
            $manager->persist($competence);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}