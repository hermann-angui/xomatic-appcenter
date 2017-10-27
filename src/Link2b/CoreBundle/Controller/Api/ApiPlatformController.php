<?php

namespace Link2b\CoreBundle\Controller\Api;

use Link2b\CoreBundle\Entity\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiPlatformController extends Controller
{

    public function createAction(Request $request)
    {

        if($request->isXmlHttpRequest()) {
            $step = 0;
            try {

            $platform =  new Platform();

            $platform->setServer($request->request->get("name_deploi"));
            $platform->setVersion($request->request->get("version_deploi"));

            $platform->setGithubUsername($request->request->get("github_username"));
            $platform->setGithubPassword($request->request->get("github_password"));
            $platform->setGithubBranch($request->request->get("github_branch"));
            $platform->setGithubMaster($request->request->get("github_master"));
            $platform->setGithubTraefik($request->request->get("github_traefik"));

            $platform->setTraefikDir($request->request->get("traefik_dir"));
            $platform->setInstallionDir($request->request->get("installation_dir"));
            $platform->setXomaticDir($request->request->get("xomatic_dir"));

            $platform->setFtpServer($request->request->get("ftp_server"));
            $platform->setFtpPasssword($request->request->get("ftp_password"));
            $platform->setFtpLogin($request->request->get("ftp_login"));


            $platform->setSshPassword($request->request->get("ssh_password"));
            $platform->setSshUsername($request->request->get("ssh_username"));

            $platform->setStep($step);


            $platform->setDescription($request->request->get("description"));
            $platform->setNote($request->request->get("note"));

            $platform->setLastUpdate(new \DateTime());
            $platform->setDateCreated(new \DateTime());
                
            //$this->getDoctrine()->getEntityManager()->persist($platform);
            $em = $this->getDoctrine()->getManager();
            $em->persist($platform);
            $em->flush();

            $response ["status"] = "success";
            $response ["id"] = $platform->getId();

            return new JsonResponse($response);

            } catch (\Exception $e) {
                $response['error'] = $e->getMessage();
                return new JsonResponse($response);
            }

        }
    }

    public function editAction(Request $request)
    {

        if($request->isXmlHttpRequest())
        {
            try {

                $platform = $this->getDoctrine()
                    ->getRepository(Platform::class)
                    ->find($request->query->get('id'));

                $platform->setGithubBranch($request->request->get("github_branch"));
                $platform->setGithubMaster($request->request->get("github_master"));

                $platform->setGithubUsername($request->request->get("github_username"));
                $platform->setGithubPassword($request->request->get("github_password"));

                $platform->setGithubTraefik($request->request->get("github_traefik"));
                $platform->setTraefikDir($request->request->get("traefik_dir"));

                $platform->setInstallionDir($request->request->get("installation_dir"));

                $platform->setFtpServer($request->request->get("ftp_server"));
                $platform->setFtpPasssword($request->request->get("ftp_password"));
                $platform->setFtpLogin($request->request->get("ftp_login"));

                $platform->setServer($request->request->get("github_password"));
                $platform->setNote($request->request->get("github_password"));

                $platform->setSshPassword($request->request->get("ssh_password"));
                $platform->setSshUsername($request->request->get("ssh_username"));

                $platform->setStep($request->request->get("step"));

                $platform->setXomaticDir($request->request->get("xomatic_dir"));

                $platform->setDescription($request->request->get("description"));
                $platform->setLastUpdate(new \DateTime());

                $this->getDoctrine()->getEntityManager()->flush($platform);

                $response ["success"] = "mise à jour effectueé avec succès";

                return new JsonResponse($response);

            } catch (\Exception $e) {

                $response = ['error' => $e->getMessage()];
                return new JsonResponse($response);
            }

        }
    }

}
