<?php

namespace CodeHighlightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CodeHighlightBundle:Default:index.html.twig', array('name' => $name));
    }
}
