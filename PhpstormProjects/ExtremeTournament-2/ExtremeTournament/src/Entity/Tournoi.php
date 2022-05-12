<?php

namespace App\Entity;

use App\Repository\TournoiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * @ORM\Entity(repositoryClass=TournoiRepository::class)
 * @UniqueEntity("nomT")
 */
class Tournoi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public  $id_t;

    /**
     *
     * @Groups ("post:read")
     * @Assert\NotBlank(message="Name is required")
     * @ORM\Column(type="string", length=255 , unique=true)
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+",
     *      message = "Name should Contains only letters ")
     * )
     */
    public $nomT;
    /**
     * @Groups ("post:read")
     * @Assert\NotBlank(message=" Name of Location is required")
     *  @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+",
     *      message = "Location  should Contains only letters ")
     * )
     * @ORM\Column(type="string", length=255)
     */
    public $emplacementT;

    /**
     * @Groups ("post:read")
     * 
     *  @var string A "Y-m-d" formatted value
     * @ORM\Column(type="date")
     */
    public $dateT;

    /**@Assert\NotBlank(message="Number  Can't be null")
     * @Assert\Positive
     *
     * @ORM\Column(type="integer")
     */
    public $id_user;

    /**
     * @ORM\OneToMany(targetEntity=Poule::class, mappedBy="id_t", orphanRemoval=true)
     */
    private $poules;




    public function __construct()
    {
        $this->poules = new ArrayCollection();
    }

    public function getIdT(): ?int
    {
        return $this->id_t;
    }




    public function getNomT(): ?string
    {
        return $this->nomT;
    }

    public function setNomT(string $nomT): self
    {
        $this->nomT = $nomT;

        return $this;
    }

    public function getEmplacementT(): ?string
    {
        return $this->emplacementT;
    }

    public function setEmplacementT(string $emplacementT): self
    {
        $this->emplacementT = $emplacementT;

        return $this;
    }

    public function getDateT(): ?\DateTimeInterface
    {
        return $this->dateT;
    }

    public function setDateT(?\DateTimeInterface $dateT): self
    {
        $this->dateT = $dateT;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }


/*
   public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->id_t;
    }

 */
    public function __toString()
    {
        return (string) $this->nomT;
    }



}
