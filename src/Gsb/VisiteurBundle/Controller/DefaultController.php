<?php

namespace Gsb\VisiteurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Gsb\ComptableBundle\Entity\Visiteur;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
         //@Auth/authentication/login.html.twig 
        
        
        //GsbVisiteurBundle:Default:Rehane.html.twig
         // On crée un objet livre

          $visiteur = new Visiteur();

    // On crée le FormBuilder grâce au service form factory

          $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $visiteur);

    // On ajoute les champs de l'entité que l'on veut ajouter à notre formulaire
         
         $formBuilder
			->add('login',  TextType::class)
                        ->add('mdp', PasswordType::class)
                        ->add('Save', SubmitType::class);
			
	$form = $formBuilder->getForm();

	// La requête est en POST
	
	$form->handleRequest($request);
	

      if ($form->isSubmitted()) {

      // On vérifie que les valeurs entrées sont correctes
      // (Nous verrons la validation des objets en détail dans le prochain chapitre)

         if ($form->isValid()) {

         
         $id = $form->get('login')->getData();
         $mdp = $form->get('mdp')->getData();
        
            
              // $em = $this->getDoctrine()->getManager();      
//On creer la requete 
               $repo = $this->getDoctrine()->getManager()->getRepository('GsbComptableBundle:Visiteur');
               
               $requete = $repo->seconnecter($id, $mdp);
              
               var_dump($requete);
            
              if ( $requete == 1){
                 /* $session = new Session();
                  $session->start();*/
                  $session = $request->getSession();

                  // stocke un attribut pour la réutilisation durant une prochaine requête utilisateur
                  $session->set('login', $id);
                  $session->set('mdp',$mdp);
                  
                  dump($requete);
                  dump("RESERVER");
                  return $this->redirectToRoute('sucesslogin');
                  
              }else {
                  $request->getSession()
                            ->getFlashBag()
                            ->add('error', 'Identifiant ou mot de passe incorrect');
              }
           
         }
      }
      
       return $this->render('GsbVisiteurBundle:Default:index.html.twig', array('form' => $form->createView()));
                                                    //Affichage
    //echo $livre->getThemeId();
    }
    
 
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

