<?php

namespace App\Entity;

use App\Repository\CharacterDungeonRequestUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterDungeonRequestUserRepository::class)
 */
class CharacterDungeonRequestUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="boolean")
     */
    private $creator;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characterDungeonRequestUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="characterDungeonRequestUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ownersCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=DungeonRequest::class, inversedBy="characterDungeonRequestUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dungeonRequest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getCreator(): ?bool
    {
        return $this->creator;
    }

    public function setCreator(bool $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOwnersCharacter(): ?Character
    {
        return $this->ownersCharacter;
    }

    public function setOwnersCharacter(?Character $ownersCharacter): self
    {
        $this->ownersCharacter = $ownersCharacter;

        return $this;
    }

    public function getDungeonRequest(): ?DungeonRequest
    {
        return $this->dungeonRequest;
    }

    public function setDungeonRequest(?DungeonRequest $dungeonRequest): self
    {
        $this->dungeonRequest = $dungeonRequest;

        return $this;
    }
}
