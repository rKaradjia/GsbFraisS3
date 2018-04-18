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
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Fichefrais")
     * @ORM\JoinColumn(nullable=false)
     **/
   private $idFicheFrais;
    
     /**
     * 
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Fichefrais")
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
    
    
    
    
    
    
    
    
    //Les relations entre entites :
    
    //LES VISITEURS
    
  /*  public function addVisiteur(Visiteur $unvisiteur)
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau
    $this->lesvisiteurs[] = $unvisiteur;
    
   // $idVisiteur.setIdVisiteur($unvisiteur.getId());

    return $this;
  }

  public function removeVisiteur(Visiteur $unvisiteur)
  {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
    $this->Lignefraisforfait->removeElement($unvisiteur);
  }

  // Notez le pluriel, on récupère une liste de catégories ici !
  public function getVisiteur()
  {
    return $this->lesvisiteurs;
  }*/
  
  
  
  //LES FRAIS FORFAIT
  
 /* public function addLesfraisforfait(FraisForfait $unFraisForfait)
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau
    $this->lesfraisforfait[] = $unFraisForfait;
    
    //$idVisiteur.setIdVisiteur($unvisiteur.getId());

    return $this;
  }

  public function removeFraisForfait(FraisForfait $unFraisForfait)
  {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
    $this->lesfraisforfait->removeElement($unFraisForfait);
  }

  // Notez le pluriel, on récupère une liste de catégories ici !
  public function getLignefraisforfait()
  {
    return $this->lesfraisforfait;
  }*/
   


    /**
     * Set lesfraisforfait
     *
     * @param \Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait
     *
     * @return Lignefraisforfait
     */
  /*  public function setLesfraisforfait(\Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait = null)
    {
        $this->lesfraisforfait = $lesfraisforfait;

        return $this;
    }*/

    /**
     * Get lesfraisforfait
     *
     * @return \Gsb\ComptableBundle\Entity\FraisForfait
     */
   /* public function getLesfraisforfait()
    {
        return $this->lesfraisforfait;
    }*/

    /**
     * Set lesfraisforfait
     *
     * @param \Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait
     *
     * @return Lignefraisforfait
     */
    public function setLesfraisforfait(\Gsb\ComptableBundle\Entity\FraisForfait $lesfraisforfait = null)
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
     * Set idVisiteur
     *
     * @param \Gsb\ComptableBundle\Entity\FicheFrais $idVisiteur
     *
     * @return Lignefraisforfait
     */
    public function setIdVisiteur(\Gsb\ComptableBundle\Entity\FicheFrais $idVisiteur = null)
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    /**
     * Get idVisiteur
     *
     * @return \Gsb\ComptableBundle\Entity\FicheFrais
     */
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }

   

    /**
     * Set idFicheFrais
     *
     * @param \Gsb\ComptableBundle\Entity\FicheFrais $idFicheFrais
     *
     * @return Lignefraisforfait
     */
    public function setIdFicheFrais(\Gsb\ComptableBundle\Entity\FicheFrais $idFicheFrais)
    {
        $this->idFicheFrais = $idFicheFrais;

        return $this;
    }

    /**
     * Get idFicheFrais
     *
     * @return \Gsb\ComptableBundle\Entity\FicheFrais
     */
    public function getIdFicheFrais()
    {
        return $this->idFicheFrais;
    }
}
