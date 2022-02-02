<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\File;

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
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @Vich\UploadableField(mapping="project_file", fileNameProperty="image")
     * @var File
     */
    private $projectFile;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
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
     * @return  self
     */ 
    public function setProjectFile(File $image=null)
    {
        $this->projectFile = $image;

        return $this;
    }
}
