<?php

namespace Link2b\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends Controller
{

    public function indexAction()
    {
        return $this->render('CoreBundle:Index:index.html.twig');
    }

}
