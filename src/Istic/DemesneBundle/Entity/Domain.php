<?php

namespace Istic\DemesneBundle\Entity;
use Istic\DemesneBundle\Entity\BaseEntities\TrackedEntityTrait as TrackedEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


/**
 * Domain
 */
class Domain
{
    use TrackedEntity;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $registrar;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $certs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->certs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Domain
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
     * Set registrar
     *
     * @param string $registrar
     *
     * @return Domain
     */
    public function setRegistrar($registrar)
    {
        $this->registrar = $registrar;

        return $this;
    }

    /**
     * Get registrar
     *
     * @return string
     */
    public function getRegistrar()
    {
        return $this->registrar;
    }

    /**
     * Set lastDataRun
     *
     * @param \DateTime $lastDataRun
     *
     * @return Domain
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
     * @return Domain
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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return Domain
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * Add user
     *
     * @param \Istic\DemesneBundle\Entity\User $user
     *
     * @return Domain
     */
    public function addUser(\Istic\DemesneBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Istic\DemesneBundle\Entity\User $user
     */
    public function removeUser(\Istic\DemesneBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * Set users
     *
     * @param \Istic\DemesneBundle\Entity\User $users
     *
     * @return Domain
     */
    public function setUsers(\Istic\DemesneBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Set certs
     *
     * @param \Istic\DemesneBundle\Entity\SSLCert $certs
     *
     * @return Domain
     */
    public function setCerts(\Istic\DemesneBundle\Entity\SSLCert $certs = null)
    {
        $this->certs = $certs;

        return $this;
    }
    /**
     * @var \Istic\DemesneBundle\Entity\User
     */
    private $user;

    /**
     * @var \Istic\DemesneBundle\Entity\SSLCert
     */
    private $cert;


    /**
     * Set user
     *
     * @param \Istic\DemesneBundle\Entity\User $user
     *
     * @return Domain
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
     * Set cert
     *
     * @param \Istic\DemesneBundle\Entity\SSLCert $cert
     *
     * @return Domain
     */
    public function setCert(\Istic\DemesneBundle\Entity\SSLCert $cert = null)
    {
        $this->cert = $cert;

        return $this;
    }

    /**
     * Get cert
     *
     * @return \Istic\DemesneBundle\Entity\SSLCert
     */
    public function getCert()
    {
        return $this->cert;
    }
    /**
     * @var array
     */
    private $data;


    /**
     * Set data
     *
     * @param array $data
     *
     * @return Domain
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


    public function validate(ExecutionContextInterface $context, $payload)
    {
        $name = strtolower($this->getName());
        $boom = explode(".", $name);
        $tld = array_pop($boom);

        $handle = fopen(__DIR__.'/../Resources/data/tlds-alpha-by-domain.txt', 'r');
        $valid = false; // init as false
        while (($buffer = fgets($handle)) !== false) {
            if (strpos(strtolower($buffer), $tld) !== false) {
                $valid = TRUE;
                break; // Once you find the string, you should break out the loop.
            }      
        }
        fclose($handle);

        // check if the name is actually a fake name
        if (!$valid) {
            $context->buildViolation("I don't recognise $tld as a TLD")
                ->atPath('name')
                ->addViolation();
        }
    }
}
