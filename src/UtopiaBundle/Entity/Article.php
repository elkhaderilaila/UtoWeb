<?php

namespace UtopiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article
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

     * @ORM\OneToOne(targetEntity="UtopiaBundle\Entity\ImageArticle", cascade={"persist","remove"})

     */

    private $imageArticle;


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
     * @return Article
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
     * @return Article
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
     * Set imageArticle
     *
     * @param \UtopiaBundle\Entity\ImageArticle $imageArticle
     * @return Article
     */
    public function setImageArticle(\UtopiaBundle\Entity\ImageArticle $imageArticle = null)
    {
        $this->imageArticle = $imageArticle;

        return $this;
    }

    /**
     * Get imageArticle
     *
     * @return \UtopiaBundle\Entity\ImageArticle 
     */
    public function getImageArticle()
    {
        return $this->imageArticle;
    }
}
