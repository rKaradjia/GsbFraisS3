<?php

namespace Gsb\VisiteurBundle\Controller;
use Gsb\VisiteurBundle\Entity\Connection;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class ConnectionController extends Controller
{
    public function afficherAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Connection();
        $task->setSaisieid('Ecrire l id');
        $task->setSaisiemdp('Ecrire le mot de passe');

        $form = $this->createFormBuilder($task)
            ->add('saisieid', TextType::class)
            ->add('saisiemdp', PasswordType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        // //@Auth/authentication/login.html.twig 
        
        
        //GsbVisiteurBundle:Default:Rehane.html.twig
        
        return $this->render('default/testAuth.html.twig', array(
            'form' => $form->createView()
        ));
    }
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

