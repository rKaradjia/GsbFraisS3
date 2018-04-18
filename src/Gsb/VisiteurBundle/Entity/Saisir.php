<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Gsb\VisiteurBundle\Entity;

class Saisir
{
    protected $jour;
    protected $mois;
    protected $annee;
    protected $repasmidi;
    protected $nuite;
    protected $etape;
    protected $km;
    protected $date;
    protected $libelle;
    protected $qte;
    protected $nbjust;
    protected $montant;
    protected $total;
    protected $montantvalide;



    public function getJour()
    {
        return $this->jour;
    }

    public function setJour($jour)
    {
        $this->jour = $jour;
    }
    
    public function getMois()
    {
        return $this->mois;
    }

    public function setMois($mois)
    {
        $this->mois = $mois;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function setAnnee(/*\DateTime $dueDate = null*/$annee)
    {
        $this->annee = $annee;
    }
    public function getRepasmidi()
    {
        return $this->repasmidi;
    }

    public function setRepasmidi ($repasmidi)
    {
        $this->repasmidi = $repasmidi;
    }
    
    public function getNuite()
    {
        return $this->nuite;
    }

    public function setNuite ($nuite)
    {
        $this->nuite = $nuite;
    }
    
     public function getEtape()
    {
        return $this->etape;
    }

    public function setEtape($etape)
    {
        $this->etape = $etape;
    }
     public function getKm()
    {
        return $this->km;
    }

    public function setKm($km)
    {
        $this->km = $km;
    }
    
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
    
    public function getQte()
    {
        return $this->qte;
    }

    public function setQte($qte)
    {
        $this->qte = $qte;
    }
 
      public function getNbjust()
    {
        return $this->nbjust;
    }

    public function setNbjust($nbjust)
    {
        $this->nbjust = $nbjust;
    }
    
      public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    
      public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
    
    public function getMontantvalide()
    {
        return $this->montantvalide;
    }
    
    public function setMontantvalide($montantvalide)
    {
        $this->montantvalide = $montantvalide;
    }
}

?>