<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
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
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $levelMax;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToMany(targetEntity=Element::class, mappedBy="characters", cascade={"persist"})
     */
    private $elements;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characters")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=CharacterDungeonRequestUser::class, mappedBy="ownersCharacter", orphanRemoval=true)
     */
    private $characterDungeonRequestUsers;

    /**
     * @ORM\ManyToOne(targetEntity=Server::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $server;

    public function __construct()
    {
        $this->elements = new ArrayCollection();
        $this->characterDungeonRequestUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevelMax(): ?bool
    {
        return $this->levelMax;
    }

    public function setLevelMax(bool $levelMax): self
    {
        $this->levelMax = $levelMax;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection|Element[]
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(Element $element): self
    {
        if (!$this->elements->contains($element)) {
            $this->elements[] = $element;
            $element->addCharacter($this);
        }

        return $this;
    }

    public function removeElement(Element $element): self
    {
        if ($this->elements->contains($element)) {
            $this->elements->removeElement($element);
            $element->removeCharacter($this);
        }

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
            $characterDungeonRequestUser->setOwnersCharacter($this);
        }

        return $this;
    }

    public function removeCharacterDungeonRequestUser(CharacterDungeonRequestUser $characterDungeonRequestUser): self
    {
        if ($this->characterDungeonRequestUsers->contains($characterDungeonRequestUser)) {
            $this->characterDungeonRequestUsers->removeElement($characterDungeonRequestUser);
            // set the owning side to null (unless already changed)
            if ($characterDungeonRequestUser->getOwnersCharacter() === $this) {
                $characterDungeonRequestUser->setOwnersCharacter(null);
            }
        }

        return $this;
    }

    public function getServer(): ?Server
    {
        return $this->server;
    }

    public function setServer(?Server $server): self
    {
        $this->server = $server;

        return $this;
    }
}
