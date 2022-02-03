<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @Vich\Uploadable
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @Vich\UploadableField(mapping="project_file", fileNameProperty="image")
     *  @Assert\File(
     *      maxSize = "2M",
     *      mimeTypes = {"image/jpeg", "image/jpg", "image/png","image/webp",}
     * )
     * @var File|null
     */
    private $projectFile;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="projects")
     * @Assert\Valid
     */
    private $skill;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url
     * @Assert\NotBlank
     */
    private $url;

    public function __construct()
    {
        $this->skill = new ArrayCollection();
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of projectFile
     *
     * @return  File
     */
    public function getProjectFile()
    {
        return $this->projectFile;
    }

    /**
     * Set the value of projectFile
     *
     * @param  File  $projectFile
     *
     */
    public function setProjectFile(?File $projectFile = null): void
    {
        $this->projectFile = $projectFile;
        if (null !== $projectFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }
  
    /**
     * @return Collection|Skill[]
     */
    public function getSkill(): Collection
    {
        return $this->skill;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skill->contains($skill)) {
            $this->skill[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skill->removeElement($skill);

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
