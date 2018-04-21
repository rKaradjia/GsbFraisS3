<?php

namespace Gsb\ComptableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefrais
 *
 * @ORM\Table(name="fichefrais")
 * @ORM\Entity(repositoryClass="Gsb\ComptableBundle\Repository\FichefraisRepository")
 */
class Fichefrais
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
    * 
    * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Visiteur",cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="idVisiteur", referencedColumnName="id")
    */
    
   private $idVisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=6)
     */
    private $mois;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=6)
     */
    private $annee;

    /**
     * @var int
     *
     * @ORM\Column(name="nbJustificatif", type="integer", nullable=true)
     */
    private $nbJustificatif;

    /**
     * @var string
     *
     * @ORM\Column(name="montantValide", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montantValide;
//precision doit etre superieur a scale
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="date", nullable=true)
     */
    private $dateModif;

   /**
    * 
    * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Etat",cascade={"persist", "remove"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $idEtat;

 
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
     * Set mois
     *
     * @param string $mois
     *
     * @return Fichefrais
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return string
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set nbJustificatif
     *
     * @param integer $nbJustificatif
     *
     * @return Fichefrais
     */
    public function setNbJustificatif($nbJustificatif)
    {
        $this->nbJustificatif = $nbJustificatif;

        return $this;
    }

    /**
     * Get nbJustificatif
     *
     * @return int
     */
    public function getNbJustificatif()
    {
        return $this->nbJustificatif;
    }

    /**
     * Set montantValide
     *
     * @param string $montantValide
     *
     * @return Fichefrais
     */
    public function setMontantValide($montantValide)
    {
        $this->montantValide = $montantValide;

        return $this;
    }

    /**
     * Get montantValide
     *
     * @return string
     */
    public function getMontantValide()
    {
        return $this->montantValide;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return Fichefrais
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    


    /**
     * Set idVisiteur
     *
     * @param \Gsb\ComptableBundle\Entity\Visiteur $idVisiteur
     *
     * @return Fichefrais
     */
    public function setIdVisiteur(Visiteur $idVisiteur)
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    /**
     * Get idVisiteur
     *
     * @return \Gsb\ComptableBundle\Entity\Visiteur
     */
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }

    /**
     * Set idEtat
     *
     * @param \Gsb\ComptableBundle\Entity\Etat $idEtat
     *
     * @return Fichefrais
     */
    public function setIdEtat(\Gsb\ComptableBundle\Entity\Etat $idEtat)
    {
        $this->idEtat = $idEtat;

        return $this;
    }

    /**
     * Get idEtat
     *
     * @return \Gsb\ComptableBundle\Entity\Etat
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * Set annee
     *
     * @param string $annee
     *
     * @return Fichefrais
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }
}
