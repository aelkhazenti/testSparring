<?php

namespace App\Entity;

use App\Repository\UserParticipationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserParticipationRepository::class)
 */
class UserParticipation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Entrainement::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_Ent;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDEnt(): ?Entrainement
    {
        return $this->ID_Ent;
    }

    public function setIDEnt(Entrainement $ID_Ent): self
    {
        $this->ID_Ent = $ID_Ent;

        return $this;
    }

    public function getIDUser(): ?User
    {
        return $this->ID_User;
    }

    public function setIDUser(User $ID_User): self
    {
        $this->ID_User = $ID_User;

        return $this;
    }
}
