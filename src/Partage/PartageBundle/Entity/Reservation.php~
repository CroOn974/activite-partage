<?php

namespace Partage\PartageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Partage\PartageBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\Column(name="accept", type="boolean", length=255, nullable=true)
     */
    private $accept;


    /**
     * @ORM\ManyToOne(targetEntity="Association", inversedBy="reservation")
     * @ORM\JoinColumn(name="asso_id", referencedColumnName="id")
     */
    protected $association;

    /**
     * @ORM\ManyToOne(targetEntity="Objets", inversedBy="reservation")
     * @ORM\JoinColumn(name="objets_id", referencedColumnName="id")
     */
    protected $objets;

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
     * Set accept
     *
     * @param string $accept
     *
     * @return Reservation
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return string
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Set association
     *
     * @param \Partage\PartageBundle\Entity\Association $association
     *
     * @return Reservation
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

    /**
     * Set objets
     *
     * @param \Partage\PartageBundle\Entity\Objets $objets
     *
     * @return Reservation
     */
    public function setObjets(\Partage\PartageBundle\Entity\Objets $objets = null)
    {
        $this->objets = $objets;

        return $this;
    }

    /**
     * Get objets
     *
     * @return \Partage\PartageBundle\Entity\Objets
     */
    public function getObjets()
    {
        return $this->objets;
    }
}
