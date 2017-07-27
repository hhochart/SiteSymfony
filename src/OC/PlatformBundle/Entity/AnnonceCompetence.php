<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnnonceCompetence
 *
 * @ORM\Table(name="annonce_competence")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\AnnonceCompetenceRepository")
 */
class AnnonceCompetence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return AnnonceCompetence
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Annonce")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * @return mixed
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * @param mixed $annonce
     *
     * @return \stdClass
     */
    public function setAnnonce(Annonce $annonce)
    {
        $this->annonce = $annonce;
    }

    /**
     * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Competence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competence;

    /**
     * @return mixed
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * @param mixed $competence
     *
     * @return \stdClass
     */
    public function setCompetence(Competence $competence)
    {
        $this->competence = $competence;
    }
}

