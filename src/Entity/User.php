<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=8, minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ankamaAccount;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="user")
     */
    private $characters;

    /**
     * @ORM\OneToMany(targetEntity=CharacterDungeonRequestUser::class, mappedBy="user", orphanRemoval=true)
     */
    private $characterDungeonRequestUsers;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->characterDungeonRequestUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAnkamaAccount(): ?string
    {
        return $this->ankamaAccount;
    }

    public function setAnkamaAccount(?string $ankamaAccount): self
    {
        $this->ankamaAccount = $ankamaAccount;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setUser($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            // set the owning side to null (unless already changed)
            if ($character->getUser() === $this) {
                $character->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CharacterDungeonRequestUser[]
     */
    public function getCharacterDungeonRequestUsers(): Collection
    {
        return $this->characterDungeonRequestUsers;
    }

    public function addCharacterDungeonRequestUser(CharacterDungeonRequestUser $characterDungeonRequestUser): self
    {
        if (!$this->characterDungeonRequestUsers->contains($characterDungeonRequestUser)) {
            $this->characterDungeonRequestUsers[] = $characterDungeonRequestUser;
            $characterDungeonRequestUser->setUser($this);
        }

        return $this;
    }

    public function removeCharacterDungeonRequestUser(CharacterDungeonRequestUser $characterDungeonRequestUser): self
    {
        if ($this->characterDungeonRequestUsers->contains($characterDungeonRequestUser)) {
            $this->characterDungeonRequestUsers->removeElement($characterDungeonRequestUser);
            // set the owning side to null (unless already changed)
            if ($characterDungeonRequestUser->getUser() === $this) {
                $characterDungeonRequestUser->setUser(null);
            }
        }

        return $this;
    }
}
