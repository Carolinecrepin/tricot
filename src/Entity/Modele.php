<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     * @Assert\Length(max="255", maxMessage="Le nom saisi {{ value }} est trop long, il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=5000)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     * @Assert\Length(max="5000", maxMessage="La description saisie {{ value }} est trop longue, elle ne devrait pas dépasser {{ limit }} caractères")
     */
    private $explication;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     * @Assert\Length(max="255", maxMessage="Le lien de la photo saisi {{ value }} est trop long, il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="modeles")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Pelote::class, mappedBy="Modele")
     * @Assert\NotBlank(message="merci de remplir ce champs")
     */
    private $pelotes;

    public function __construct()
    {
        $this->pelotes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getExplication(): ?string
    {
        return $this->explication;
    }

    public function setExplication(string $explication): self
    {
        $this->explication = $explication;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Pelote[]
     */
    public function getPelotes(): Collection
    {
        return $this->pelotes;
    }

    public function addPelote(Pelote $pelote): self
    {
        if (!$this->pelotes->contains($pelote)) {
            $this->pelotes[] = $pelote;
            $pelote->addModele($this);
        }

        return $this;
    }

    public function removePelote(Pelote $pelote): self
    {
        if ($this->pelotes->removeElement($pelote)) {
            $pelote->removeModele($this);
        }

        return $this;
    }
}
