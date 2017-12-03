<?php

namespace Gsb\VisiteurtestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GsbVisiteurtestBundle:Default:index.html.twig');
    }
}
