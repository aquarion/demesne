<?php

namespace Istic\DemesneBundle\Entity;
use Istic\DemesneBundle\Entity\BaseEntities\TrackedEntityTrait as TrackedEntity;

/**
 * SSLCert
 */
class SSLCert
{
    use TrackedEntity;
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $data;

    /**
     * @var \DateTime
     */
    private $expiresAt;


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
     * Set data
     *
     * @param array $data
     *
     * @return SSLCert
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return SSLCert
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    /**
     * @var \DateTime
     */
    private $last_data_run;

    /**
     * @var \DateTime
     */
    private $next_data_run;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $modified_at;

    /**
     * @var \Istic\DemesneBundle\Entity\Domain
     */
    private $domain;

    /**
     * @var \Istic\DemesneBundle\Entity\User
     */
    private $user;


    /**
     * Set lastDataRun
     *
     * @param \DateTime $lastDataRun
     *
     * @return SSLCert
     */
    public function setLastDataRun($lastDataRun)
    {
        $this->last_data_run = $lastDataRun;

        return $this;
    }

    /**
     * Get lastDataRun
     *
     * @return \DateTime
     */
    public function getLastDataRun()
    {
        return $this->last_data_run;
    }

    /**
     * Set nextDataRun
     *
     * @param \DateTime $nextDataRun
     *
     * @return SSLCert
     */
    public function setNextDataRun($nextDataRun)
    {
        $this->next_data_run = $nextDataRun;

        return $this;
    }

    /**
     * Get nextDataRun
     *
     * @return \DateTime
     */
    public function getNextDataRun()
    {
        return $this->next_data_run;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SSLCert
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return SSLCert
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * Set domain
     *
     * @param \Istic\DemesneBundle\Entity\Domain $domain
     *
     * @return SSLCert
     */
    public function setDomain(\Istic\DemesneBundle\Entity\Domain $domain = null)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return \Istic\DemesneBundle\Entity\Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set user
     *
     * @param \Istic\DemesneBundle\Entity\User $user
     *
     * @return SSLCert
     */
    public function setUser(\Istic\DemesneBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Istic\DemesneBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @ORM\PrePersist
     */
    public function updatedTimestamps()
    {
        // Add your code here
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domain = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add domain
     *
     * @param \Istic\DemesneBundle\Entity\Domain $domain
     *
     * @return SSLCert
     */
    public function addDomain(\Istic\DemesneBundle\Entity\Domain $domain)
    {
        $this->domain[] = $domain;

        return $this;
    }

    /**
     * Remove domain
     *
     * @param \Istic\DemesneBundle\Entity\Domain $domain
     */
    public function removeDomain(\Istic\DemesneBundle\Entity\Domain $domain)
    {
        $this->domain->removeElement($domain);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domains;


    /**
     * Get domains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomains()
    {
        return $this->domains;
    }
}
