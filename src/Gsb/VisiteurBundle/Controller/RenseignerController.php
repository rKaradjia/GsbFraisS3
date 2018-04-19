<?php

namespace Gsb\VisiteurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Gsb\VisiteurBundle\Entity\Saisir;
use Gsb\ComptableBundle\Entity\Fichefrais;
use Gsb\ComptableBundle\Entity\Lignefraisforfait;
use Gsb\ComptableBundle\Entity\Lignefraishorsforfait;
use Gsb\ComptableBundle\Entity\Etat;
use Gsb\ComptableBundle\Entity\Visiteur;
use Gsb\ComptableBundle\Entity\FraisForfait;


use \Datetime;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\Type;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request;



class RenseignerController extends Controller
{
    
    public function buttonAction(Request $request)
    {
        $saisir = new Saisir();

    // On crée le FormBuilder grâce au service form factory

          $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $saisir);

    // On ajoute les champs de l'entité que l'on veut ajouter à notre formulaire
         
         $formBuilder
                 
                         ->add('jour', ChoiceType::class, array(
    'choices'  => array(
        '01' => 01,
        '05' => 05,          //LISTE DEROULANTE
        '10' => 10,
        '15' => 15,
        '20' => 20,
        '25' => 25,
        '30' => 30,
        '31' => 31,
    ),
))
			 ->add('mois',  ChoiceType::class, array(
    'choices'  => array(
        '01' => 01,
        '02' => 02,
        '03' => 03,
        '04' => 04,
        '05' => 05,
        '06' => 06,
        '07' => 07,
        '08' => 08,
        '09' => 09,
        '10' => 10,
        '11' => 10,
        '12' => 12,
    ),
))
                         ->add('annee',   ChoiceType::class, array(
    'choices'  => array(
        '2013' => 2013,
        '2014' => 2014,
        '2015' => 2015,
        '2016' => 2016,
        '2017' => 2017,
        '2018' => 2018,
        
    ),
))
                         ->add('repasmidi',  TextType::class)
                         ->add('nuite',  TextType::class)
                         ->add('etape',  TextType::class)
                         ->add('km',  TextType::class)
                         ->add('date', DateType::class)
                         ->add('libelle',  TextType::class)
                         ->add('montant',  TextType::class)
                         ->add('nbjust',  TextType::class)
                         ->add('montantvalide',  TextType::class)
                         

                        ->add('Save', SubmitType::class);
			
	$form = $formBuilder->getForm();
       var_dump('avant le submit');
	// La requête est en POST
	
	$form->handleRequest($request);
	

     if ($form->isSubmitted()) {
          
          var_dump('apres le submit et avant le isvalid');
 
          
      // On vérifie que les valeurs entrées sont correctes
      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

         if ($form->isValid()) {
       //recuperation de toutes les valeurs saisies par l'utilisateur
         $jour = $form->get('jour')->getData();
         $mois = $form->get('mois')->getData();
         $annee = $form->get('annee')->getData();
         $repasmidi = $form->get('repasmidi')->getData();
         $nuite = $form->get('nuite')->getData();
         $etape = $form->get('etape')->getData();
         $km = $form->get('km')->getData();
         $dateHorsForfait = $form->get('date')->getData();/////////////////Test des differentes manières de creer une datetime
         var_dump($dateHorsForfait);
         //$dateTime = new \DateTime($dateHorsForfait);*/
        // var_dump("Date tranformé issu du formulaire "   .$dateTime);      ////////////END////////////
         $libelle = $form->get('libelle')->getData();
         $montant = $form->get('montant')->getData();
         $nbjust = $form->get('nbjust')->getData();
         $montantvalide = $form->get('montantvalide')->getData();
        
         var_dump('Contenu des champs ' . $jour . '' . $mois . ' ' . $nuite);
         
//recuperation des valeurs de session
         $session = $request->getSession();
         
         $login=$session->get('login');
         $mdp=$session->get('mdp');
         
         var_dump("Recuperation des données dans la variable de session " . $login);
         var_dump($mdp);
         
 //on recupere l'identifiant du visiteur        
         $repo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Visiteur');     
         $requete = $repo->findUser($login,$mdp);
         $intrequete = (int)$requete;
// Recherche d'un tuple par numéro d'id 
         $unvisiteur = $repo->find($intrequete);
    
//recuperation du repository des fraisforfait et etat ils seront utilisés pour l'enregistrement de la fiche et des ligneFraisForfait
         $fraisforfaitrepo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:FraisForfait');  
         $etatrepo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Etat');   
         
         
         
        //  ENCLENCHEMENT DE LA PROCEDURE DE L ENREGISTREMENT DE LA NOUVELLE FICHE FRAIS
        $em = $this->getDoctrine()->getManager();
       
         
        //  DEBUT DE L INSERTION DECALAGE A DROITE 1 TABLE SUR 2---->REPERAGE
         
         
        
        
        
                $fichefrais = new Fichefrais();
                $fichefrais->setMois($mois);
                $fichefrais->setNbJustificatif($nbjust);
                $fichefrais->setMontantValide($montant); 
                $dateString = $annee.'-'.$mois.'-'.$jour;
       // $fichefrais->setDateModif(\DateTime::createFromFormat('d.m.Y', $dateString)->format('Y-m-d'));
                $date = \DateTime::createFromFormat('Y-m-d', $dateString);
       // $fichefrais->setDateModif($date);       
                $etat = $etatrepo ->find(3); 
                $fichefrais->setIdEtat($etat);
                $fichefrais->setIdVisiteur($unvisiteur);         
                $fichefrais->setMontantValide($montantvalide);
                $fichefrais->setDateModif($date);

        
        
        $lignefraisforfait4 = new Lignefraisforfait();
        $lignefraisforfait4->setQuantite($repasmidi);  
        $lefraisforfait4 = $fraisforfaitrepo ->find(4); 
        $lignefraisforfait4->setLesfraisforfait($lefraisforfait4);
        $lignefraisforfait4->setIdFicheFrais($fichefrais);
   
        
        
                $lignefraisforfait3 = new Lignefraisforfait();
                $lignefraisforfait3->setQuantite($nuite);  
                $lefraisforfait3 = $fraisforfaitrepo ->find(3);        
                $lignefraisforfait3->setLesfraisforfait($lefraisforfait3);
                $lignefraisforfait3->setIdFicheFrais($fichefrais);
        
        $lignefraisforfait1 = new Lignefraisforfait();
        $lignefraisforfait1->setQuantite($etape);
        $lefraisforfait1 = $fraisforfaitrepo ->find(1);       
        $lignefraisforfait1->setLesfraisforfait($lefraisforfait1);
        $lignefraisforfait1->setIdFicheFrais($fichefrais);
        
                $lignefraisforfait2 = new Lignefraisforfait();
                $lignefraisforfait2->setQuantite($km);
                $lefraisforfait2 = $fraisforfaitrepo ->find(2);       
                $lignefraisforfait2->setLesfraisforfait($lefraisforfait2);
                $lignefraisforfait2->setIdFicheFrais($fichefrais);
        
        
        $lignefraishorsforfait = new Lignefraishorsforfait();

        $lignefraishorsforfait->setLibelle($libelle);
        var_dump('var dump LIBELLE '.$libelle);
        $lignefraishorsforfait->setMontant($montant);
        $lignefraishorsforfait->setIdFicheFrais($fichefrais);
        $lignefraishorsforfait->setDate($dateHorsForfait);
            
        
        $em->persist($fichefrais);     
        $em->persist($lignefraisforfait1);
        $em->persist($lignefraisforfait2);
        $em->persist($lignefraisforfait3);
        $em->persist($lignefraisforfait4);
        $em->persist($lignefraishorsforfait);
        $em->flush();
                  
        
       //return $this->redirectToRoute('sucesslogin');  Désactiver pour l'instant
                  
              }
           
        // }
     }
        return $this->render('GsbVisiteurBundle:Default:renseigner.html.twig', array('form' => $form->createView()));
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
