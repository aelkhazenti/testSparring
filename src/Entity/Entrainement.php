<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrainementRepository::class)
 */
class Entrainement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeb_E;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin_E;

    /**
     * @ORM\Column(type="time")
     */
    private $heurDeb_E;

    /**
     * @ORM\Column(type="time")
     */
    private $heurFin_E;

    /**
     * @ORM\Column(type="json")
     */
    private $type_E =[];

    /**
     * @ORM\Column(type="json", length=255)
     */
    private $typeEntrainement_E = [];

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="entrainementsID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebE(): ?\DateTimeInterface
    {
        return $this->dateDeb_E;
    }

    public function setDateDebE(\DateTimeInterface $dateDeb_E): self
    {
        $this->dateDeb_E = $dateDeb_E;

        return $this;
    }

    public function getDateFinE(): ?\DateTimeInterface
    {
        return $this->dateFin_E;
    }

    public function setDateFinE(\DateTimeInterface $dateFin_E): self
    {
        $this->dateFin_E = $dateFin_E;

        return $this;
    }

    public function getHeurDebE(): ?\DateTimeInterface
    {
        return $this->heurDeb_E;
    }

    public function setHeurDebE(\DateTimeInterface $heurDeb_E): self
    {
        $this->heurDeb_E = $heurDeb_E;

        return $this;
    }

    public function getHeurFinE(): ?\DateTimeInterface
    {
        return $this->heurFin_E;
    }

    public function setHeurFinE(\DateTimeInterface $heurFin_E): self
    {
        $this->heurFin_E = $heurFin_E;

        return $this;
    }

    public function getTypeE(): ?array
    {
        return $this->type_E;
    }

    public function setTypeE(array $type_E): self
    {
        $this->type_E = $type_E;

        return $this;
    }

    public function getTypeEntrainementE(): ?array
    {
        return $this->typeEntrainement_E;
    }

    public function setTypeEntrainementE(array $typeEntrainement_E): self
    {
        $this->typeEntrainement_E = $typeEntrainement_E;

        return $this;
    }

    public function getIDUser(): ?User
    {
        return $this->ID_User;
    }

    public function setIDUser(?User $ID_User): self
    {
        $this->ID_User = $ID_User;

        return $this;
    }
}
