<?php

namespace UtopiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Temoignage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Temoignage
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="UtopiaBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;


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
     * Set description
     *
     * @param string $description
     * @return Temoignage
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
     * Set client
     *
     * @param \UtopiaBundle\Entity\Client $client
     * @return Temoignage
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
}
