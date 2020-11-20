<?php

namespace App\Entity;

use App\Repository\DungeonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DungeonRepository::class)
 */
class Dungeon
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
     * @ORM\OneToMany(targetEntity=DungeonRequest::class, mappedBy="dungeon", orphanRemoval=true)
     */
    private $dungeonRequests;

    public function __construct()
    {
        $this->dungeonRequests = new ArrayCollection();
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

    /**
     * @return Collection|DungeonRequest[]
     */
    public function getDungeonRequests(): Collection
    {
        return $this->dungeonRequests;
    }

    public function addDungeonRequest(DungeonRequest $dungeonRequest): self
    {
        if (!$this->dungeonRequests->contains($dungeonRequest)) {
            $this->dungeonRequests[] = $dungeonRequest;
            $dungeonRequest->setDungeon($this);
        }

        return $this;
    }

    public function removeDungeonRequest(DungeonRequest $dungeonRequest): self
    {
        if ($this->dungeonRequests->contains($dungeonRequest)) {
            $this->dungeonRequests->removeElement($dungeonRequest);
            // set the owning side to null (unless already changed)
            if ($dungeonRequest->getDungeon() === $this) {
                $dungeonRequest->setDungeon(null);
            }
        }

        return $this;
    }
}
