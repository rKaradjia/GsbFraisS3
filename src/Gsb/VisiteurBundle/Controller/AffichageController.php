<?php

namespace Gsb\VisiteurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;

class AffichageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
         
        return $this->render('GsbVisiteurBundle:Default:Rehane.html.twig');
    }
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

