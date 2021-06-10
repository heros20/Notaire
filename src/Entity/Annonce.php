<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Vous devez respecter {{ limit }} caractères minimums",
     *      maxMessage = "Vous devez respecter {{ limit }} caractères maximums"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Vous devez respecter {{ limit }} caractères minimums",
     *      maxMessage = "Vous devez respecter {{ limit }} caractères maximums"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Vous devez respecter {{ limit }} chiffres minimum",
     * )
     */
    private $superficie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Vous devez respecter {{ limit }} chiffres minimum",
     * )
     */
    private $superficieTerrain;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Vous devez respecter {{ limit }} chiffres minimum",
     * )
     */
    
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 3,
     *      minMessage = "Vous devez respecter {{ limit }} caractères minimums",
     *      maxMessage = "Vous devez respecter {{ limit }} caractères maximums"
     * )
     */
    private $dpe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 1,
     *      max = 2,
     *      minMessage = "Vous devez respecter {{ min }} caractères minimums",
     *      maxMessage = "Vous devez respecter {{ max }} caractères maximums"
     * )
     */
    private $ges;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *  @Assert\Length(
     *      min = 1,
     *      minMessage = "Vous devez respecter {{ min }} caractères minimums"
     * )
     */
    private $nbrePieces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 1,
     *      minMessage = "Vous devez respecter {{ min }} caractères minimums"
     * )
     */
    private $nbreChambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *  @Assert\Length(
     *      min = 1,
     *      minMessage = "Vous devez respecter {{ min }} caractères minimums"
     * )
     */
    private $salleBain;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 1,
     *      minMessage = "Vous devez respecter {{ min }} caractères minimums"
     * )
     */
    private $wc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $garage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piscine;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="annonces")
     * @Assert\NotBlank
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotBlank
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $departement;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="favoris")
     */
    private $favoris;

    /**
     * @ORM\ManyToMany(targetEntity=Contact::class, mappedBy="annonce")
     */
    private $contacts;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifiedAt;
    
    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->category = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(?int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getSuperficieTerrain(): ?int
    {
        return $this->superficieTerrain;
    }

    public function setSuperficieTerrain(?int $superficieTerrain): self
    {
        $this->superficieTerrain = $superficieTerrain;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDpe(): ?int
    {
        return $this->dpe;
    }

    public function setDpe(?int $dpe): self
    {
        $this->dpe = $dpe;

        return $this;
    }

    public function getGes(): ?int
    {
        return $this->ges;
    }

    public function setGes(?int $ges): self
    {
        $this->ges = $ges;

        return $this;
    }

    public function getNbrePieces(): ?int
    {
        return $this->nbrePieces;
    }

    public function setNbrePieces(?int $nbrePieces): self
    {
        $this->nbrePieces = $nbrePieces;

        return $this;
    }

    public function getNbreChambre(): ?int
    {
        return $this->nbreChambre;
    }

    public function setNbreChambre(?int $nbreChambre): self
    {
        $this->nbreChambre = $nbreChambre;

        return $this;
    }

    public function getSalleBain(): ?int
    {
        return $this->salleBain;
    }

    public function setSalleBain(?int $salleBain): self
    {
        $this->salleBain = $salleBain;

        return $this;
    }

    public function getWc(): ?int
    {
        return $this->wc;
    }

    public function setWc(?int $wc): self
    {
        $this->wc = $wc;

        return $this;
    }

    public function getGarage(): ?int
    {
        return $this->garage;
    }

    public function setGarage(?int $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getPiscine(): ?int
    {
        return $this->piscine;
    }

    public function setPiscine(?int $piscine): self
    {
        $this->piscine = $piscine;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(User $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
        }

        return $this;
    }

    public function removeFavori(User $favori): self
    {
        $this->favoris->removeElement($favori);

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->addAnnonce($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            $contact->removeAnnonce($this);
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }
}
