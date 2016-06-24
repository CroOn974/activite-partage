<?php
namespace Partage\PartageBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Objets
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Particulier", inversedBy="objets")
     * @ORM\JoinColumn(name="particulier_id", referencedColumnName="id")
     */
    private $particulier;

    /**
     * @ORM\OneToOne(targetEntity="Reservation", mappedBy="objets")
     */
    protected $reservation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->association = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Objets
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $description
     *
     * @return Objets
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tel
     *
     * @param string $categorie
     *
     * @return Objets
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set particulier
     *
     * @param \Partage\PartageBundle\Entity\Particulier $particulier
     *
     * @return Objets
     */
    public function setParticulier(
        \Partage\PartageBundle\Entity\Particulier $particulier = null
    )
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
     * Set reservation
     *
     * @param \Partage\PartageBundle\Entity\Reservation $reservation
     *
     * @return Objets
     */
    public function setReservation(\Partage\PartageBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Partage\PartageBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
