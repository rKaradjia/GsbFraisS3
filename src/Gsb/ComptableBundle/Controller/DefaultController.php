<?php

namespace Gsb\ComptableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GsbComptableBundle:Default:index.html.twig');
    }
}
