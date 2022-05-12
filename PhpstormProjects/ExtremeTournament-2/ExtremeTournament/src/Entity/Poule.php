<?php

namespace App\Entity;

use App\Repository\PouleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * @ORM\Entity(repositoryClass=PouleRepository::class)
 * @UniqueEntity("nom_poule")

 */
class Poule
{

    /**
     * @ORM\Id
     * @Assert\NotBlank(message=" Poule Name Can't be Empty")
     * @Groups ("post:read")
     * @Assert\Regex(
     *     pattern     = "/^(Poule)+[ ]+[a-z]$/i",
     *     htmlPattern = "(Poule)+[ ]+[a-z]",
     *     message = "Name should be like for exemple : Poule A")
     * @ORM\Column(type="string", length=255  , unique=true )
     */
    public $nom_poule ;

    /**
     * @ORM\ManyToOne(targetEntity=Tournoi::class, inversedBy="poules")
     * @ORM\JoinColumn(name="idT",referencedColumnName="id_t",nullable=false)
     */
    private $id_t;

    /**
     *
     * @ORM\OneToMany(targetEntity=Matchs::class, mappedBy="poules", orphanRemoval=true)
     */
    private $matchs;
    

    public function __construct()
    {
        $this->matchs = new ArrayCollection();
    }


    public function getNomPoule(): ?string
    {
        return $this->nom_poule;
    }

    public function setNomPoule(string $nom_poule): self
    {
        $this->nom_poule = $nom_poule;

        return $this;
    }


    public function getIdT(): ?tournoi
    {
        return $this->id_t;
    }

    public function getid_t(): ?tournoi
    {
        return $this->id_t;
    }
    public function setIdT(?tournoi $id_t): self
    {
        $this->id_t = $id_t;

        return $this;
    }
    public function setid_t(?tournoi $id_t): self
    {
        $this->id_t = $id_t;

        return $this;
    }

    /**
     * @return Collection<int, Matchs>
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(Matchs $match): self
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs[] = $match;
            $match->setPoules($this);
        }

        return $this;
    }

    public function removeMatch(Matchs $match): self
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getPoules() === $this) {
                $match->setPoules(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->id_t;
    }
}
