<?php

namespace Gsb\ComptableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gsb\ComptableBundle\Entity\Visiteur;

/**
 * Lignefraisforfait
 *
 * @ORM\Table(name="lignefraisforfait")
 * @ORM\Entity(repositoryClass="Gsb\ComptableBundle\Repository\LignefraisforfaitRepository")
 */
class Lignefraisforfait
{
    //     * @ORM\ManyToMany(targetEntity="Gsb\VisiteurBundle\Entity\Visiteur", cascade={"persist"})
     /**
     * 
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\FraisForfait", cascade={"persist"})
     * @ORM\JoinColumn(name="idfraisforfait", referencedColumnName="id")
     **/
    private $lesfraisforfait;

    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
   
    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;
    
     /**
     * 
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Fichefrais",cascade={"persist"})
     * @ORM\JoinColumn(name="idfiche", referencedColumnName="id")
     **/
   private $idFicheFrais;
    
     /**
     * 
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Fichefrais", cascade={"persist"})
     * @ORM\JoinColumn(name="mois", referencedColumnName="mois")
     **/
  //  private $mois;
    

  /* public function __construct()
  {
    
    $this->lesvisiteurs = new ArrayCollection();
    
  }*/
    

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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Lignefraisforfait
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    
    
  

    /**
     * Set lesfraisforfait
     *
     * @param \Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait
     *
     * @return Lignefraisforfait
     */
    public function setLesfraisforfait(\Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait)
    {
        $this->lesfraisforfait = $lesfraisforfait;

        return $this;
    }

    /**
     * Get lesfraisforfait
     *
     * @return \Gsb\ComptableBundle\Entity\FraisForfait
     */
    public function getLesfraisforfait()
    {
        return $this->lesfraisforfait;
    }

    /**
     * Set idFicheFrais
     *
     * @param \Gsb\ComptableBundle\Entity\Fichefrais $idFicheFrais
     *
     * @return Lignefraisforfait
     */
    public function setIdFicheFrais(\Gsb\ComptableBundle\Entity\Fichefrais $idFicheFrais)
    {
        $this->idFicheFrais = $idFicheFrais;

        return $this;
    }

    /**
     * Get idFicheFrais
     *
     * @return \Gsb\ComptableBundle\Entity\Fichefrais
     */
    public function getIdFicheFrais()
    {
        return $this->idFicheFrais;
    }
}
