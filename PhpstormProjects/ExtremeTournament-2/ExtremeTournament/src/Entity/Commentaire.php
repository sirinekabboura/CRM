<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_commentaire;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $text;

    /**
     * @ORM\Column(type="date")
     */
    private $date_comment;

    /**
     * @ORM\ManyToOne(targetEntity=publication::class, inversedBy="commentaires")
     * @ORM\JoinColumn(name="id_publication",referencedColumnName="id_publication",nullable=false)
     */
    private $id_publication;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_reports;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="comments")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id_user",nullable=false)
     */
    private $id_user;


    public function __construct()
    {
        $this->id_publication = new ArrayCollection();
        $this->id_user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDateComment(): ?\DateTimeInterface
    {
        return $this->date_comment;
    }

    public function setDateComment(\DateTimeInterface $date_comment): self
    {
        $this->date_comment = $date_comment;

        return $this;
    }

    /**
     * @return Collection<int, publication>
     */
    public function getIdPublication(): Collection
    {
        return $this->id_publication;
    }

    public function addIdPublication(publication $idPublication): self
    {
        if (!$this->id_publication->contains($idPublication)) {
            $this->id_publication[] = $idPublication;
        }

        return $this;
    }

    public function removeIdPublication(publication $idPublication): self
    {
        $this->id_publication->removeElement($idPublication);

        return $this;
    }

    public function getNbrReports(): ?int
    {
        return $this->nbr_reports;
    }

    public function setNbrReports(int $nbr_reports): self
    {
        $this->nbr_reports = $nbr_reports;

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

    public function addIdUser(user $idUser): self
    {
        if (!$this->id_user->contains($idUser)) {
            $this->id_user[] = $idUser;
        }

        return $this;
    }

    public function removeIdUser(user $idUser): self
    {
        $this->id_user->removeElement($idUser);

        return $this;
    }
}
