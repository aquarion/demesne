<?php

namespace Istic\DemesneBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Istic\DemesneBundle\Entity\BaseEntities\TrackedEntityTrait as TrackedEntity;

/**
 * User
 */
class User extends BaseUser
{
    use TrackedEntity;
    
    /**
     * @var integer
     */
    protected $id;


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
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $modified_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $certs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domains;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @return User
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
     * Add cert
     *
     * @param \Istic\DemesneBundle\Entity\SSLCert $cert
     *
     * @return User
     */
    public function addCert(\Istic\DemesneBundle\Entity\SSLCert $cert)
    {
        $this->certs[] = $cert;

        return $this;
    }

    /**
     * Remove cert
     *
     * @param \Istic\DemesneBundle\Entity\SSLCert $cert
     */
    public function removeCert(\Istic\DemesneBundle\Entity\SSLCert $cert)
    {
        $this->certs->removeElement($cert);
    }

    /**
     * Get certs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCerts()
    {
        return $this->certs;
    }

    /**
     * Add domain
     *
     * @param \Istic\DemesneBundle\Entity\Domain $domain
     *
     * @return User
     */
    public function addDomain(\Istic\DemesneBundle\Entity\Domain $domain)
    {
        $this->domains[] = $domain;

        return $this;
    }

    /**
     * Remove domain
     *
     * @param \Istic\DemesneBundle\Entity\Domain $domain
     */
    public function removeDomain(\Istic\DemesneBundle\Entity\Domain $domain)
    {
        $this->domains->removeElement($domain);
    }

    /**
     * Get domains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomains()
    {
        return $this->domains;
    }
    /**
     * @ORM\PrePersist
     */
    public function updatedTimestamps()
    {
        // Add your code here
    }
}
