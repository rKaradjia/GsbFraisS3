<?php

namespace Gsb\ComptableBundle\Repository;

/**
 * VisiteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VisiteurRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function seconnecter($id, $mdp) {
        $em = $this->getEntityManager();// $this->getDoctrine()->getManager();      
//On creer la requete 
        var_dump( 'Se connecter ' . $id . ' ' .$mdp);
  
               $query = $em->createQuery(
                   'SELECT count(v.id)
                    FROM GsbComptableBundle:visiteur v
                    WHERE v.login = :login
                    AND v.mdp = :mdp'
                  );
                       
                   $query->setParameter('login', $id);
                   $query->setParameter('mdp' , $mdp);
                   
                   return $query->getSingleScalarResult();
    
    
    }
    
    public function findUser($id,$mdp) {
        
        //cette fonction se base sur la recuperation du login stocké dans une variable via 
        //l'instance de session
        
        
       // var_dump('Identifiant de l utilisateur ' .$id . ' '.$mdp);
        
        
        $em = $this->getEntityManager();// $this->getDoctrine()->getManager();      
//On creer la requete 
  
               $query = $em->createQuery(
                   'SELECT v.id
                    FROM GsbComptableBundle:visiteur v
                    WHERE v.login = :login
                    AND v.mdp = :mdp'
                  );
                       
                   $query->setParameter('login', $id);
                   $query->setParameter('mdp' , $mdp);
                   
                   return $query->getScalarResult();
    
    
    }
}