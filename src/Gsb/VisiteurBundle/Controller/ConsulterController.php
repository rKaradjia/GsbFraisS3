<?php

namespace Gsb\VisiteurBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gsb\VisiteurBundle\Entity\Consulter;
use Gsb\ComptableBundle\Entity\Visiteur;
use Gsb\VisiteurBundle\Entity\Saisir;
use Gsb\ComptableBundle\Entity\Fichefrais;
use Gsb\ComptableBundle\Entity\Lignefraisforfait;
use Gsb\ComptableBundle\Entity\Lignefraishorsforfait;
use Gsb\ComptableBundle\Entity\Etat;
use Gsb\ComptableBundle\Entity\FraisForfait;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ConsulterController extends Controller
{
    
    public function buttonAction(Request $request)
    {
        $consulter = new Consulter();

    // On crée le FormBuilder grâce au service form factory

          $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $consulter);

          
          
          
            $monthleight = 13;
            $tab = array();
            for($i=01;$i < $monthleight;$i++)
                {
            $tab[$i] = $i;
                } 
          
                
                
            $yearleight = 2019;
            $tabyear = array();
            for($y=2000;$y < $yearleight;$y++)
                {
            $tabyear[$y] = $y;
                }     
    // On ajoute les champs de l'entité que l'on veut ajouter à notre formulaire
         
         $formBuilder
                 
                         ->add('annee', ChoiceType::class, array(
    'choices'  => array(
           $tabyear
    ),
))
			 ->add('mois',  ChoiceType::class, array(
    'choices'  => array(
        '01' => '01',
         '02' => '02',
         '03' => '03',
         '04' => '04',
         '05' => '05',
         '06' => '06',
         '07' => '07',
         '08' => '08',
         '09' => '09',
         '10' => '10',
         '11' => '11',
         '12' => '12',
    ),
))
                         

                         
                         

                        ->add('Save', SubmitType::class);
			
	$form = $formBuilder->getForm();
       var_dump('avant le submit');
	// La requête est en POST
	
	$form->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        
        
        if ($form->isSubmitted()) {
          
          var_dump('apres le submit et avant le isvalid');
 
          
      // On vérifie que les valeurs entrées sont correctes
      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

             if ($form->isValid()) {
                 
                 $mois = $form->get('mois')->getData();
                 $annee = $form->get('annee')->getData();
                 $session = $request->getSession();
         
                    $login=$session->get('login');
                    $mdp=$session->get('mdp');
         
                       var_dump("Recuperation des données dans la variable de session " . $login);
                       var_dump($mdp);
         
 //on recupere l'identifiant du visiteur        
                       $repo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Visiteur');     
                       $requete = $repo->findUser($login,$mdp);
                       
                       print_r($requete);
                       $intrequete = (int)$requete;
                       
                       var_dump('Identifiant du visiteur lors de l execution de la requete ' . ' lors de la conversion '. $intrequete);
// Recherche d'un tuple par numéro d'id 
                       //$unvisiteur = $repo->find($intrequete);
                 
                       
                       //1er tableau
                       $repofiche = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Fichefrais');
                       $requeteidfiche = $repofiche->findidFiche($mois,$annee,$intrequete);//identifiant de la fiche
                       $requetefiche = $repofiche->findFiche($mois,$annee,$intrequete);//toute la fiche
                      
                       
                       //2 nd tableau :ligne frais hors forfait
                       $repohorsforfait = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Lignefraishorsforfait');
                       $requetehorsforfait = $repohorsforfait->findhorsforfait($requeteidfiche);
                       
                       var_dump($requetehorsforfait . ' ' .$requetefiche);
                 
             }
             
             //YEAR(Date) = 2014 AND MONTH(Date) = 8
             
             
        }
         return $this->render('GsbVisiteurBundle:Default:consulter.html.twig', array('form' => $form->createView()));
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
    ?>