<?php

namespace Link2b\CoreBundle\Controller\Api;

use Link2b\CoreBundle\Entity\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sinner\Phpseclib\Net\Net_SSH2;

class ApiInstallController extends Controller
{

    public function installAction(Request $request)
    {

        try {
            /**@var \Link2b\CoreBundle\Entity\Platform $platform **/

            $id = $request->query->get('id', "0");
            $parameters['step'] = $request->query->get('step', '0');

            $platform = $this->getDoctrine()->getRepository(Platform::class)->find($id);

            if($platform){

                $parameters['server_name'] = $platform->getId();
                $parameters['ssh_username'] = $platform->getServer();
                $parameters['ssh_password'] = $platform->getSshPassword();
                $parameters['install_dir'] = $platform->getInstallionDir();

                $parameters['xomatic_dir'] = $platform->getXomaticDir();
                $parameters['traefik_dir'] = $platform->getTraefikDir();

                $parameters['github_branch'] = $platform->getGithubBranch();
                $parameters['github_traefik'] = $platform->getGithubTraefik();
            }

            $parameters['server_name']  = "192.168.99.100";     //"167.114.253.138";
            $parameters['ssh_username'] = "root";           // "root";
            $parameters['ssh_password'] = "anguidev";           //"fgHIoj";
            $parameters['install_dir']  =  "/home/angui";       //"/home/debian";
            $parameters['github_branch'] = "https://github.com/hermann-angui/TestRepo.git";
            $parameters['github_traefik'] = "https://github.com/ltbt/dmpxo-traefik.git";

            $response = null;

            if(!isset($ssh)) {

                $ssh = new Net_SSH2($parameters['server_name']);

                if (!$ssh->login($parameters['ssh_username'], $parameters['ssh_password']))
                {
                    exit('Echec de connexion au serveur');
                }
            }

            $step = $request->query->get("step", "0");

            switch ($step)
            {

                case "0":
                    $response['console'][0] = $this->exec_command($ssh, "lscpu");
                    $response['console'][1] = "Veuillez reprendre svp";
                    $response['version'] = "2.10";
                    break;
                case "1":
                   // $response['console'][0] = $this->installGit($ssh);
                    $response['version'] = $this->exec_command($ssh, "git --version");
                    $response['status'] = ($this->isInstalled($ssh, "git")) ? "success" : "failed";
                    break;

                case "2":

                    $response['console'][0] = $this->installDocker($ssh);
                    $response['version'] = $this->exec_command($ssh, "docker --version");
                    $response['status'] = ($this->isInstalled($ssh, "docker")) ? "success" : "failed";
                    break;

                case "3":

                    $response['console'][0] = $this->installDockerCompose($ssh);
                    $response['version'] = $this->exec_command($ssh, "docker-compose --version");
                    $response['status'] = ($this->isInstalled($ssh, "docker-compose")) ? "success" : "failed";
                    break;

                case "4":

                    $response['console'][0] = $this->installComposer($ssh);
                    $response['version'] = $this->exec_command($ssh, "composer --version");
                    $response['status']  = ($this->isInstalled($ssh, "composer")) ? "success" : "failed";
                    break;

                case "5":

                    $response['console'][0] = $this->gitCloneTreafik($ssh, $parameters['install_dir'], $parameters['traefik_dir'] , $parameters['github_traefik']);
                    $response['console'][1] = $this->launchTraefikDockerContainer($ssh,"{$parameters['install_dir']} . "/" . {$parameters['traefik_dir']}");
                    break;

                case "6":

                    $response['console'][0] = $this->gitCloneXomatic($ssh, $parameters['install_dir'], $parameters['xomatic_dir'] , $parameters['github_branch']);
                    $response['console'][1] = $this->composerInstallXomaticVendorPackage($ssh, $parameters['install_dir'] . "/" . $parameters['xomatic_dir']);
                    $response['console'][2] = $this->launchXomaticDockerContainer($ssh, $parameters['install_dir'] . "/" . $parameters['xomatic_dir']);
                    $this->chmodXomaticDir($ssh,$parameters['install_dir'] . "/" . $parameters['xomatic_dir']);
                    break;
            }

            return new JsonResponse($response);

        } catch (\Exception $e) {

            $response['error'] = $e->getMessage();
            return new JsonResponse($response);
        }

    }

    public function checkIfInstallAction(Request $request)
    {

        try {

            /**@var \Link2b\CoreBundle\Entity\Platform $platform **/

            $software = $request->query->get("software", "");
            $id = $request->query->get('id', "0");

            $platform = $this->getDoctrine()->getRepository(Platform::class)->find($id);

            if($platform){

                $parameters['server_name'] = $platform->getId();
                $parameters['ssh_username'] = $platform->getServer();
                $parameters['ssh_password'] = $platform->getSshPassword();
            }

            $parameters['server_name']  = "192.168.99.100";     //"167.114.253.138";
            $parameters['ssh_username'] = "root";           // "root";
            $parameters['ssh_password'] = "anguidev";           //"fgHIoj";

            $response = null;

            if(!isset($ssh)) {

                $ssh = new Net_SSH2($parameters['server_name']);

                if (!$ssh->login($parameters['ssh_username'], $parameters['ssh_password']))
                {
                    exit('Echec de connexion au serveur');
                }
            }


            switch ($software)
            {

                case "docker":
                    $response['version'] = $this->exec_command($ssh, "docker --version");
                    $response['status'] = ($this->isInstalled($ssh, "docker")) ? "success" : "failed";
                    break;
                case "docker-compose":
                    $response['version'] = $this->exec_command($ssh, "docker-compose --version");
                    $response['status'] = ($this->isInstalled($ssh, "docker-compose")) ? "success" : "failed";
                    break;
                case "composer":
                    $response['version'] = $this->exec_command($ssh, "composer --version");
                    $response['status'] = ($this->isInstalled($ssh, "composer")) ? "success" : "failed";
                    break;
                case "git":
                    $response['version'] = $this->exec_command($ssh, "git --version");
                    $response['status'] = ($this->isInstalled($ssh, "git")) ? "success" : "failed";
                    break;

                default:
                    break;

            }

            return new JsonResponse($response);

        } catch (\Exception $e) {
            //$response['error'] =  $e->getMessage();
            return new JsonResponse("une erreur est survenue");
        }

    }



    /**
     * @param $ssh Net_SSH2
     * @param $package
     * @return bool
     */
    function isInstalled($ssh, $package)
    {
        $isPackageInstallMessage = "install ok installed";

        $res = $ssh->exec("dpkg-query -W -f='\${Status}' " . $package);

        return (strcmp(trim($res), trim($isPackageInstallMessage)) === 0) ? true : false;
    }


    /**
     * @param $ssh Net_SSH2
     * @param $command
     * @param bool $output
     */
    function exec_display($ssh, $command, $output = true)
    {
        if ($output) echo "<pre style='background-color:black;padding:10px;color:green'>" . htmlspecialchars($ssh->exec($command)) . "</pre>";

        else $ssh->exec($command);
    }

    /**
     * @param $ssh Net_SSH2
     * @param $command
     * @return string
     */
    function exec_command($ssh, $command)
    {
        return $ssh->exec($command);
    }


    /**
     * @param $ssh Net_SSH2
     * @return string
     */
    function installDocker($ssh)
    {
        return $this->exec_command($ssh, 'apt-get update;' .
            'apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common' .
            'curl -fsSL https://download.docker.com/linux/$(. /etc/os-release; echo "$ID")/gpg | sudo apt-key add -;' .
            'add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/$(. /etc/os-release; echo "$ID") $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list;' .
            'apt-get update;' .
            'apt-get -y install docker-ce'
            );
    }


    /**
     * @param $ssh Net_SSH2
     * @return string
     */
    function installDockerCompose($ssh)
    {
        return $this->exec_command($ssh, 'apt-get -y docker-compose');
    }


    /**
     * @param $ssh Net_SSH2
     * @return string
     */
    function installComposer($ssh)
    {
        return $this->exec_command($ssh, "curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin" .
            "composer --version"
            );
    }


    /**
     * @param $ssh Net_SSH2
     * @return string
     */
    function installGit($ssh)
    {
        return $this->exec_command($ssh, "apt-get -y install git-all");
    }


    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @param $url
     * @return string
     */
    function gitCloneTreafik($ssh, $path, $clone_dir, $url)
    {
        return $this->exec_command($ssh, "cd {$path};" .
            "git clone {$url} {$clone_dir}"
            );
    }


    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @return string
     */
    function launchTraefikDockerContainer($ssh, $path)
    {
        return $this->exec_command($ssh, "cd {$path};" .
            "docker-compose up -d"
             );
    }


    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @param $url
     * @return bool
     */
    function gitCloneXomatic($ssh, $path, $clone_dir, $url)
    {
        return $this->exec_command($ssh, "cd {$path};" .
            "git clone {$url} {$clone_dir}"
            );
    }


    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @return bool
     */
    function composerInstallXomaticVendorPackage($ssh, $path)
    {
        return $this->exec_command($ssh, "cd {$path}/app;" .
            "php composer install --ignore-platform-reqs"
            );
    }

    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @return string
     */
    function launchXomaticDockerContainer($ssh, $path)
    {
        return $this->exec_command($ssh, "cd {$path};" .
            "docker-compose up -d"
            );
    }

    /**
     * @param $ssh Net_SSH2
     * @param $path
     * @return string
     */
    function chmodXomaticDir($ssh, $path)
    {
        return $this->exec_command($ssh, "cd {$path};chmod -R 777 {$path}/tmp;chmod -R 777 {$path}/app;chmod -R 777 {$path}/app/app/cache");
    }
}
