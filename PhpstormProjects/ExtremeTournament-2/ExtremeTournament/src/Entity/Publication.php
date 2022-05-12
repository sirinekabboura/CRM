<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_publication;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $status;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="publications")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id_user",nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="id_publication")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=Likess::class, mappedBy="id_publication", orphanRemoval=true)
     */
    private $likesses;

    /**
     * @ORM\OneToMany(targetEntity=Forum::class, mappedBy="id_publication", orphanRemoval=true)
     */
    private $forums;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->likesses = new ArrayCollection();
        $this->forums = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->addIdPublication($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            $commentaire->removeIdPublication($this);
        }

        return $this;
    }

    public function getForum(): ?Forum
    {
        return $this->forum;
    }

    public function setForum(?Forum $forum): self
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * @return Collection<int, Likess>
     */
    public function getLikesses(): Collection
    {
        return $this->likesses;
    }

    public function addLikess(Likess $likess): self
    {
        if (!$this->likesses->contains($likess)) {
            $this->likesses[] = $likess;
            $likess->setIdPublication($this);
        }

        return $this;
    }

    public function removeLikess(Likess $likess): self
    {
        if ($this->likesses->removeElement($likess)) {
            // set the owning side to null (unless already changed)
            if ($likess->getIdPublication() === $this) {
                $likess->setIdPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Forum>
     */
    public function getForums(): Collection
    {
        return $this->forums;
    }

    public function addForum(Forum $forum): self
    {
        if (!$this->forums->contains($forum)) {
            $this->forums[] = $forum;
            $forum->setIdPublication($this);
        }

        return $this;
    }

    public function removeForum(Forum $forum): self
    {
        if ($this->forums->removeElement($forum)) {
            // set the owning side to null (unless already changed)
            if ($forum->getIdPublication() === $this) {
                $forum->setIdPublication(null);
            }
        }

        return $this;
    }
}
