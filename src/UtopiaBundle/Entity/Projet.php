<?php

namespace UtopiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Projet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Projet
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity="UtopiaBundle\Entity\Metier",inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */

    private $metier;
    
    
    /**

     * @ORM\ManyToMany(targetEntity="UtopiaBundle\Entity\Categorie" , mappedBy="projets")

     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="UtopiaBundle\Entity\Client",inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */

    private $client;


    /**

     * @ORM\OneToMany(targetEntity="UtopiaBundle\Entity\ImageProjet", mappedBy="projet", cascade={"persist","remove"})

     */
    private $images;


    public function __construct()

    {

        $this->dateCreation= new \Datetime();
        $this->categories= new ArrayCollection();
        $this->images =new ArrayCollection();

    }

    public function addCategorie(Categorie $cat)

    {

        $this->categories[] = $cat;
        return $this;

    }
    public function removeCatgorie(Categorie $cat)

    {

        $this->categories->removeElement($cat);

    }

    public function removeImage(ImageProjet $img)

    {

        $this->images->removeElement($img);

    }

    public function addImage(ImageProjet $img)

    {

        $this->images[] = $img;
        return $this;

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
     * Set titre
     *
     * @param string $titre
     * @return Projet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Projet
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set metier
     *
     * @param \UtopiaBundle\Entity\Metier $metier
     * @return Projet
     */
    public function setMetier(\UtopiaBundle\Entity\Metier $metier)
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * Get metier
     *
     * @return \UtopiaBundle\Entity\Metier 
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Add categories
     *
     * @param \UtopiaBundle\Entity\Categorie $categories
     * @return Projet
     */
    public function addCategory(\UtopiaBundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \UtopiaBundle\Entity\Categorie $categories
     */
    public function removeCategory(\UtopiaBundle\Entity\Categorie $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set client
     *
     * @param \UtopiaBundle\Entity\Client $client
     * @return Projet
     */
    public function setClient(\UtopiaBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \UtopiaBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }
}
