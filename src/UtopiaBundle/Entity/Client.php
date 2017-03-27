<?php

namespace UtopiaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**

    * @ORM\OneToOne(targetEntity="UtopiaBundle\Entity\ImageClient", cascade={"persist","remove"})

    */
    private $imageClient;


    /**

     * @ORM\OneToMany(targetEntity="UtopiaBundle\Entity\Projet", mappedBy="client")

     */
    private $projets;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set imageClient
     *
     * @param \UtopiaBundle\Entity\ImageClient $imageClient
     * @return Client
     */
    public function setImageClient(\UtopiaBundle\Entity\ImageClient $imageClient = null)
    {
        $this->imageClient = $imageClient;

        return $this;
    }

    /**
     * Get imageClient
     *
     * @return \UtopiaBundle\Entity\ImageClient 
     */
    public function getImageClient()
    {
        return $this->imageClient;
    }

    /**
     * Add projets
     *
     * @param \UtopiaBundle\Entity\Projet $projets
     * @return Client
     */
    public function addProjet(\UtopiaBundle\Entity\Projet $projets)
    {
        $this->projets[] = $projets;

        return $this;
    }

    /**
     * Remove projets
     *
     * @param \UtopiaBundle\Entity\Projet $projets
     */
    public function removeProjet(\UtopiaBundle\Entity\Projet $projets)
    {
        $this->projets->removeElement($projets);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjets()
    {
        return $this->projets;
    }
}
