<?php

namespace Link2b\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PlatformController extends Controller
{

    public function newAction()
    {
        return $this->render('CoreBundle:Platform:new.html.twig');
    }

    public function createAction(Request $request)
    {
        // Save data to dB and redirecte to start deploiement
        return $this->redirectToRoute('startdeploiement');
    }


    public function newDeploiementAction(Request $request)
    {
        return $this->render('CoreBundle:Platform:newdeploiement.html.twig');
    }

    public function finishDeploiementAction(Request $request)
    {
        return $this->render('CoreBundle:Platform:finishDeploiement.html.twig');
    }
}
