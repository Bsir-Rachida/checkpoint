<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\File;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @Vich\Uploadable
 */
class Document
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
     * @Vich\UploadableField(mapping="CV_file", fileNameProperty="file")
     * @var File
     */
    private $CV;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

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
     * Get the value of projectFile
     *
     * @return  File
     */
    public function getCV()
    {
        return $this->CV;
    }

    /**
     * Set the value of projectFile
     *
     * @param  File  $projectFile
     *
     * @return  self
     */
    public function setCV(File $file = null)
    {
        $this->CV = $file;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }
}
