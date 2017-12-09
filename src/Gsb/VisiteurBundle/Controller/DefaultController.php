<?php

namespace Gsb\VisiteurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GsbVisiteurBundle:Default:index.html.twig');
    }
}
