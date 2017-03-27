<?php

namespace UtopiaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categorie
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

     * @ORM\ManyToMany(targetEntity="UtopiaBundle\Entity\Projet" ,inversedBy="categories")
     */


    private $projets;

    public function __construct()
    {

        $this->projets = new ArrayCollection();

    }
    
    public function addProjet(Projet $projet)

    {

        $this->projets[] = $projet;
        return $this;

    }


    public function removeProjet(Projet $projet)

    {

        $this->projets->removeElement($projet);

    }


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
     * @return Categorie
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
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjets()
    {
        return $this->projets;
    }
}
