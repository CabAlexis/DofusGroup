<?php

namespace App\Entity;

use App\Repository\DungeonRequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DungeonRequestRepository::class)
 */
class DungeonRequest
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
    private $numberParticipates;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity=Dungeon::class, inversedBy="dungeonRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dungeon;

    /**
     * @ORM\OneToMany(targetEntity=CharacterDungeonRequestUser::class, mappedBy="dungeonRequest")
     */
    private $characterDungeonRequestUsers;

    public function __construct()
    {
        $this->characterDungeonRequestUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberParticipates(): ?int
    {
        return $this->numberParticipates;
    }

    public function setNumberParticipates(int $numberParticipates): self
    {
        $this->numberParticipates = $numberParticipates;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDungeon(): ?Dungeon
    {
        return $this->dungeon;
    }

    public function setDungeon(?Dungeon $dungeon): self
    {
        $this->dungeon = $dungeon;

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
            $characterDungeonRequestUser->setDungeonRequest($this);
        }

        return $this;
    }

    public function removeCharacterDungeonRequestUser(CharacterDungeonRequestUser $characterDungeonRequestUser): self
    {
        if ($this->characterDungeonRequestUsers->contains($characterDungeonRequestUser)) {
            $this->characterDungeonRequestUsers->removeElement($characterDungeonRequestUser);
            // set the owning side to null (unless already changed)
            if ($characterDungeonRequestUser->getDungeonRequest() === $this) {
                $characterDungeonRequestUser->setDungeonRequest(null);
            }
        }

        return $this;
    }
}
