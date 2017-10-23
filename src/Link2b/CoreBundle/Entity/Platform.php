<?php

namespace Link2b\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Platform
 *
 * @ORM\Table(name="platform")
 * @ORM\Entity(repositoryClass="Link2b\CoreBundle\Repository\PlatformRepository")
 */
class Platform
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="server", type="string", length=255, nullable=true)
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="ssh_username", type="string", length=255, nullable=true)
     */
     private  $sshUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="ssh_password", type="string", length=255, nullable=true)
     */
    private   $sshPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private   $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private  $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime", nullable=true)
     */
    private  $last_update;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private   $note;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_server", type="string", length=350, nullable=true)
     */
    private   $ftpServer;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_login", type="string", length=255, nullable=true)
     */
    private   $ftpLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_passsword", type="string", length=255, nullable=true)
     */
    private  $ftpPasssword;

    /**
     * @var string
     *
     * @ORM\Column(name="install_dir", type="string", length=255, nullable=true)
     */
    private   $installionDir;

    /**
     * @var string
     *
     * @ORM\Column(name="github_traefik", type="string", length=255, nullable=true)
     */
    private   $githubTraefik;

    /**
     * @var string
     *
     * @ORM\Column(name="xomatic_branch_name", type="string", length=255, nullable=true)
     */
    private   $xomaticBranchName;

    /**
     * @var string
     *
     * @ORM\Column(name="github_branch", type="string", length=255, nullable=true)
     */
    private   $githubBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="github_master", type="string", length=255, nullable=true)
     */
    private   $githubMaster;

    /**
     * @var string
     *
     * @ORM\Column(name="github_username", type="string", length=255, nullable=true)
     */
    private   $githubUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="github_password", type="string", length=255, nullable=true)
     */
    private   $githubPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
    private   $version;

    /**
     * @var int
     *
     * @ORM\Column(name="step", type="smallint", nullable=true)
     */
    private   $step;

    /**
     * @var string
     *
     * @ORM\Column(name="xomatic_dir", type="string", length=355, nullable=true)
     */
    private   $xomaticDir;


    /**
     * @var string
     *
     * @ORM\Column(name="traefik_dir", type="string", length=355, nullable=true)
     */
    private   $traefikDir;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set server
     *
     * @param string $server
     *
     * @return Platform
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set sshUsername
     *
     * @param string $sshUsername
     *
     * @return Platform
     */
    public function setSshUsername($sshUsername)
    {
        $this->sshUsername = $sshUsername;

        return $this;
    }

    /**
     * Get sshUsername
     *
     * @return string
     */
    public function getSshUsername()
    {
        return $this->sshUsername;
    }

    /**
     * Set sshPassword
     *
     * @param string $sshPassword
     *
     * @return Platform
     */
    public function setSshPassword($sshPassword)
    {
        $this->sshPassword = $sshPassword;

        return $this;
    }

    /**
     * Get sshPassword
     *
     * @return string
     */
    public function getSshPassword()
    {
        return $this->sshPassword;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Platform
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Platform
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Platform
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Platform
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set ftpServer
     *
     * @param string $ftpServer
     *
     * @return Platform
     */
    public function setFtpServer($ftpServer)
    {
        $this->ftpServer = $ftpServer;

        return $this;
    }

    /**
     * Get ftpServer
     *
     * @return string
     */
    public function getFtpServer()
    {
        return $this->ftpServer;
    }

    /**
     * Set ftpUsername
     *
     * @param string $ftpUsername
     *
     * @return Platform
     */
    public function setFtpLogin($ftpUsername)
    {
        $this->ftpLogin = $ftpUsername;

        return $this;
    }

    /**
     * Get ftpLogin
     *
     * @return string
     */
    public function getFtpLogin()
    {
        return $this->ftpLogin;
    }

    /**
     * Set ftpPasssword
     *
     * @param string $ftpPasssword
     *
     * @return Platform
     */
    public function setFtpPasssword($ftpPasssword)
    {
        $this->ftpPasssword = $ftpPasssword;

        return $this;
    }

    /**
     * Get ftpPasssword
     *
     * @return string
     */
    public function getFtpPasssword()
    {
        return $this->ftpPasssword;
    }

    /**
     * Set installionDir
     *
     * @param string $installionDir
     *
     * @return Platform
     */
    public function setInstallionDir($installionDir)
    {
        $this->installionDir = $installionDir;

        return $this;
    }

    /**
     * Get installionDir
     *
     * @return string
     */
    public function getInstallionDir()
    {
        return $this->installionDir;
    }

    /**
     * Set githubTraefik
     *
     * @param string $githubTraefik
     *
     * @return Platform
     */
    public function setGithubTraefik($githubTraefik)
    {
        $this->githubTraefik = $githubTraefik;

        return $this;
    }

    /**
     * Get githubTraefik
     *
     * @return string
     */
    public function getGithubTraefik()
    {
        return $this->githubTraefik;
    }

    /**
     * Set xomaticBranchName
     *
     * @param string $xomaticBranchName
     *
     * @return Platform
     */
    public function setXomaticBranchName($xomaticBranchName)
    {
        $this->xomaticBranchName = $xomaticBranchName;

        return $this;
    }

    /**
     * Get xomaticBranchName
     *
     * @return string
     */
    public function getXomaticBranchName()
    {
        return $this->xomaticBranchName;
    }

    /**
     * Set githubBranch
     *
     * @param string $githubBranch
     *
     * @return Platform
     */
    public function setGithubBranch($githubBranch)
    {
        $this->githubBranch = $githubBranch;

        return $this;
    }

    /**
     * Get githubBranch
     *
     * @return string
     */
    public function getGithubBranch()
    {
        return $this->githubBranch;
    }

    /**
     * Set githubMaster
     *
     * @param string $githubMaster
     *
     * @return Platform
     */
    public function setGithubMaster($githubMaster)
    {
        $this->githubMaster = $githubMaster;

        return $this;
    }

    /**
     * Get githubMaster
     *
     * @return string
     */
    public function getGithubMaster()
    {
        return $this->githubMaster;
    }

    /**
     * Set githubUsername
     *
     * @param string $githubUsername
     *
     * @return Platform
     */
    public function setGithubUsername($githubUsername)
    {
        $this->githubUsername = $githubUsername;

        return $this;
    }

    /**
     * Get githubUsername
     *
     * @return string
     */
    public function getGithubUsername()
    {
        return $this->githubUsername;
    }

    /**
     * Set githubPassword
     *
     * @param string $githubPassword
     *
     * @return Platform
     */
    public function setGithubPassword($githubPassword)
    {
        $this->githubPassword = $githubPassword;

        return $this;
    }

    /**
     * Get githubPassword
     *
     * @return string
     */
    public function getGithubPassword()
    {
        return $this->githubPassword;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Platform
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set step
     *
     * @param integer $step
     *
     * @return Platform
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return integer
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set xomaticDir
     *
     * @param string $xomaticDir
     *
     * @return Platform
     */
    public function setXomaticDir($xomaticDir)
    {
        $this->xomaticDir = $xomaticDir;

        return $this;
    }

    /**
     * Get xomaticDir
     *
     * @return string
     */
    public function getXomaticDir()
    {
        return $this->xomaticDir;
    }

    /**
     * Set traefikDir
     *
     * @param string $traefikDir
     *
     * @return Platform
     */
    public function setTraefikDir($traefikDir)
    {
        $this->traefikDir = $traefikDir;

        return $this;
    }

    /**
     * Get traefikDir
     *
     * @return string
     */
    public function getTraefikDir()
    {
        return $this->traefikDir;
    }
}
