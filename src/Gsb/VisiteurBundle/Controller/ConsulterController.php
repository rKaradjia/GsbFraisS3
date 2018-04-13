<?php

namespace Gsb\VisiteurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gsb\ComptableBundle\Entity\Visiteur;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request;



class ConsulterController extends Controller
{
    
    public function buttonAction()
    {
        return $this->render('GsbVisiteurBundle:Default:consulter.html.twig');
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
