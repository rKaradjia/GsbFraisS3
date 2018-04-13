<?php

namespace Gsb\ComptableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table(name="etat")
 * @ORM\Entity(repositoryClass="Gsb\ComptableBundle\Repository\EtatRepository")
 */
class Etat
{
     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Gsb\ComptableBundle\Entity\Visiteur")
     *      
     */
   
  //  private $lesvisiteurs;
    
    
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
     * @ORM\Column(name="libelle", type="string", length=30, nullable=true)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Etat
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
 //   private $visiteur;

    /**
     * Constructor
     */
   /* public function __construct()
    {
        $this->visiteur = new \Doctrine\Common\Collections\ArrayCollection();
    }*/

    /**
     * Add visiteur
     *
     * @param \Gsb\ComptableBundle\Entity\Visiteur $visiteur
     *
     * @return Etat
     */
  /*  public function addVisiteur(\Gsb\ComptableBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur[] = $visiteur;

        return $this;
    }*/

    /**
     * Remove visiteur
     *
     * @param \Gsb\ComptableBundle\Entity\Visiteur $visiteur
     */
   /* public function removeVisiteur(\Gsb\ComptableBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur->removeElement($visiteur);
    }*/

    /**
     * Get visiteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
   /* public function getVisiteur()
    {
        return $this->visiteur;
    }*/
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $visiteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visiteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add visiteur
     *
     * @param \Gsb\ComptableBundle\Entity\Visiteur $visiteur
     *
     * @return Etat
     */
    public function addVisiteur(\Gsb\ComptableBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur[] = $visiteur;

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \Gsb\ComptableBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\Gsb\ComptableBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur->removeElement($visiteur);
    }

    /**
     * Get visiteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }
}
