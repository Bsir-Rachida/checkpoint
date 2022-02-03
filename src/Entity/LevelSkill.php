<?php

namespace App\Entity;

use App\Repository\LevelSkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelSkillRepository::class)
 */
class LevelSkill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="levelSkill")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    public function __construct()
    {
        $this->level = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getLevel(): Collection
    {
        return $this->level;
    }

    public function addLevel(Skill $level): self
    {
        if (!$this->level->contains($level)) {
            $this->level[] = $level;
            $level->setLevelSkill($this);
        }

        return $this;
    }

    public function removeLevel(Skill $level): self
    {
        if ($this->level->removeElement($level)) {
            // set the owning side to null (unless already changed)
            if ($level->getLevelSkill() === $this) {
                $level->setLevelSkill(null);
            }
        }

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
