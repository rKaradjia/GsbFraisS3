<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Gsb\VisiteurBundle\Entity;

class Consulter
{
    protected $mois;
    protected $annee;
    



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
}    

