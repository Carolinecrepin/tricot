<?php

namespace App\Entity;

use App\Repository\PeloteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PeloteRepository::class)
 */
class Pelote
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     * @Assert\Length(max="255", maxMessage="La matière saisie {{ value }} est trop longue, elle ne devrait pas dépasser {{ limit }} caractères")
     */
    private $material;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $meters;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tailleAiguilles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="merci de remplir ce champs")
     * @Assert\Length(max="255", maxMessage="L'url' saisi {{ value }} est trop long, il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Modele::class, inversedBy="pelotes")
     * @Assert\NotBlank(message="merci de remplir ce champs")
     */
    private $Modele;

    public function __construct()
    {
        $this->Modele = new ArrayCollection();
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

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getMeters(): ?int
    {
        return $this->meters;
    }

    public function setMeters(?int $meters): self
    {
        $this->meters = $meters;

        return $this;
    }

    public function getTailleAiguilles(): ?int
    {
        return $this->tailleAiguilles;
    }

    public function setTailleAiguilles(?int $tailleAiguilles): self
    {
        $this->tailleAiguilles = $tailleAiguilles;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

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

    /**
     * @return Collection|Modele[]
     */
    public function getModele(): Collection
    {
        return $this->Modele;
    }

    public function addModele(Modele $modele): self
    {
        if (!$this->Modele->contains($modele)) {
            $this->Modele[] = $modele;
        }

        return $this;
    }

    public function removeModele(Modele $modele): self
    {
        $this->Modele->removeElement($modele);

        return $this;
    }
}
