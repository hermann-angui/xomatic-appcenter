<?php

namespace Link2b\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Link2b\CoreBundle\Entity\Platform;


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


    public function newDeploiementAction($id)
    {
        return $this->render('CoreBundle:Platform:newdeploiement.html.twig', ['id' => $id]);
    }

    public function finishDeploiementAction(Request $request)
    {
        //$platform
        $id = $request->query->get('id');

        $platform = $this->getDoctrine()->getRepository(Platform::class)->find($id);

        //echo '<pre>' . print_r($platform, true) . '</pre>';
        //die();

        return $this->render('CoreBundle:Platform:finishDeploiement.html.twig', ['platform', $platform]);
    }

    public function updateDeploiementAction(Request $request)
    {
        return $this->render('CoreBundle:Platform:updateDeploiement.html.twig');
    }
}
