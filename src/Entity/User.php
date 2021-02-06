<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudo_U;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hauteur_U;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $poids_U;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age_U;

    /**
     * @ORM\OneToMany(targetEntity=Entrainement::class, mappedBy="ID_User")
     */
    private $entrainementsID;

    public function __construct()
    {
        $this->entrainementsID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudoU(): ?string
    {
        return $this->pseudo_U;
    }

    public function setPseudoU(?string $pseudo_U): self
    {
        $this->pseudo_U = $pseudo_U;

        return $this;
    }

    public function getHauteurU(): ?float
    {
        return $this->hauteur_U;
    }

    public function setHauteurU(?float $hauteur_U): self
    {
        $this->hauteur_U = $hauteur_U;

        return $this;
    }

    public function getPoidsU(): ?float
    {
        return $this->poids_U;
    }

    public function setPoidsU(?float $poids_U): self
    {
        $this->poids_U = $poids_U;

        return $this;
    }

    public function getAgeU(): ?int
    {
        return $this->age_U;
    }

    public function setAgeU(?int $age_U): self
    {
        $this->age_U = $age_U;

        return $this;
    }

    /**
     * @return Collection|Entrainement[]
     */
    public function getEntrainementsID(): Collection
    {
        return $this->entrainementsID;
    }

    public function addEntrainementsID(Entrainement $entrainementsID): self
    {
        if (!$this->entrainementsID->contains($entrainementsID)) {
            $this->entrainementsID[] = $entrainementsID;
            $entrainementsID->setIDUser($this);
        }

        return $this;
    }

    public function removeEntrainementsID(Entrainement $entrainementsID): self
    {
        if ($this->entrainementsID->removeElement($entrainementsID)) {
            // set the owning side to null (unless already changed)
            if ($entrainementsID->getIDUser() === $this) {
                $entrainementsID->setIDUser(null);
            }
        }

        return $this;
    }
}
