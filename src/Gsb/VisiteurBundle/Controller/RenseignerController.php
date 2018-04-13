<?php

namespace Gsb\VisiteurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gsb\VisiteurBundle\Entity\Saisir;
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
        '05' => 05,
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
                         ->add('date',  DateType::class)
                         ->add('libelle',  TextType::class)
                         ->add('qte',  TextType::class)
                         ->add('nbjust',  TextType::class)
                         ->add('montant',  TextType::class)
                         ->add('total',  TextType::class)

                        ->add('Save', SubmitType::class)
         
                        ->add('Annuler', SubmitType::class);
			
	$form = $formBuilder->getForm();

	// La requête est en POST
	
	$form->handleRequest($request);
	

      if ($form->isSubmitted()) {
 /* protected $jour;
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
    protected $total;*/
          
      // On vérifie que les valeurs entrées sont correctes
      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

         if ($form->isValid()) {

         $jour = $form->get('jour')->getData();
         $mois = $form->get('mois')->getData();
         $annee = $form->get('annee')->getData();
         $repasmidi = $form->get('repasmidi')->getData();
         $nuite = $form->get('nuite')->getData();
         $etape = $form->get('etape')->getData();
         $km = $form->get('km')->getData();
         $date = $form->get('date')->getData();
         $libelle = $form->get('libelle')->getData();
         $qte = $form->get('qte')->getData();
         $nbjust = $form->get('nbjust')->getData();
         $montant = $form->get('montant')->getData();
         $total = $form->get('total')->getData();
        
            
    
      //  $repo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:FicheFrais');
        $em = $this->getDoctrine()->getManager();
       // $requete = $repo->insertFicheFrais($nbjust, $montant,$jour,$mois,$annee);
  //On recupere sous forme de tableau si et seulement si il y a une correpondance avec les données saisies  
           
                    //->getResult();
// Est ce que la tableau est remplit
            
             // if ( count($nbLigne) == 1){
                  
        $fichefrais = new \Gsb\ComptableBundle\Entity\Fichefrais();
        
        $fichefrais->setMois($mois);
        $fichefrais->setNbJustificatif($nbjust);
        $fichefrais->setMontantValide($montant); 
        $dateString = $mois+'/'+$jour+'/'+$annee;
        $date = date('Y-m-d', strtotime($dateString));       
        $fichefrais->setDateModif($date);
        $fichefrais->setIdEtat(3);
        $fichefrais->setIdVisiteur(3);

        $lignefraisforfait4 = new \Gsb\ComptableBundle\Entity\Lignefraisforfait();
        $lignefraisforfait4->setQuantite($repasmidi);
        $lignefraisforfait4->setLesfraisforfait(4);
        
        $lignefraisforfait3 = new \Gsb\ComptableBundle\Entity\Lignefraisforfait();
        $lignefraisforfait3->setQuantite($nuite);
        $lignefraisforfait3->setLesfraisforfait(3);
        
        $lignefraisforfait1 = new \Gsb\ComptableBundle\Entity\Lignefraisforfait();
        $lignefraisforfait1->setQuantite($etape);
        $lignefraisforfait1->setLesfraisforfait(1);
        
        $lignefraisforfait2 = new \Gsb\ComptableBundle\Entity\Lignefraisforfait();
        $lignefraisforfait2->setQuantite($km);
        $lignefraisforfait2->setLesfraisforfait(2);
        
        
        $lignefraishorsforfait = new \Gsb\ComptableBundle\Entity\Lignefraishorsforfait;
        $lignefraishorsforfait->setDate($date);
        $lignefraishorsforfait->setLibelle($libelle);
        $lignefraishorsforfait->setMontant($montant);
            
        
        // relate this product to the category
        //$product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();
                  
        print_r ($nbLigne);
        print_r("RESERVER");
        return $this->redirectToRoute('sucesslogin');
                  
              //}
           
         }
      }
        return $this->render('GsbVisiteurBundle:Default:renseigner.html.twig', array('form' => $form->createView()));
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
