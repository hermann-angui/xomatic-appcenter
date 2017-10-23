<?php

namespace Link2b\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="Link2b\CoreBundle\Repository\ApplicationRepository")
 */
class Application
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
     private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
     private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", length=255, nullable=true)
     */
     private $dateCreated;
     
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime", length=255, nullable=true)
     */
     private $lastUpdated;

     
     /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
     private $note;


    /**
     * @var string
     *
     * @ORM\Column(name="ftp_server", type="string", length=255, nullable=true)
     */
     private $ftpServer;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_password", type="string", length=255, nullable=true)
     */     
     private $ftpPasssword;

    /**
     * @var string
     *
     * @ORM\Column(name="github_branch", type="string", length=255, nullable=true)
     */       
     private $githubBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="github_master", type="string", length=255, nullable=true)
     */ 
     private $githubMaster;
     
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Application
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Application
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
     * Set description
     *
     * @param string $description
     *
     * @return Application
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
     * @return Application
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     *
     * @return Application
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Application
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
     * @return Application
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
     * Set ftpPasssword
     *
     * @param string $ftpPasssword
     *
     * @return Application
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
     * Set githubBranch
     *
     * @param string $githubBranch
     *
     * @return Application
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
     * @return Application
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
}
