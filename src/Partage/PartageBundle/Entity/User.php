<?php

namespace Partage\PartageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Particulier", mappedBy="user")
     */
    protected $particulier;

    /**
     * @ORM\OneToOne(targetEntity="Association", mappedBy="user")
     */
    protected $association;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set groupeerror: Argument 1 passed to Partage\PartageBundle\Entity\Particulier::setUser() must be an instance of Partage\PartageBundle\Entity\User, integer given, called in /home/simplon/activite-parta
     *
     * @param string $groupe
     *
     * @return User
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return string
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set particulier
     *
     * @param \Partage\PartageBundle\Entity\Particulier $particulier
     *
     * @return User
     */
    public function setParticulier(\Partage\PartageBundle\Entity\Particulier $particulier = null)
    {
        $this->particulier = $particulier;

        return $this;
    }

    /**
     * Get particulier
     *
     * @return \Partage\PartageBundle\Entity\Particulier
     */
    public function getParticulier()
    {
        return $this->particulier;
    }

    /**
     * Set association
     *
     * @param \Partage\PartageBundle\Entity\Association $association
     *
     * @return User
     */
    public function setAssociation(\Partage\PartageBundle\Entity\Association $association = null)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return \Partage\PartageBundle\Entity\Association
     */
    public function getAssociation()
    {
        return $this->association;
    }
}
