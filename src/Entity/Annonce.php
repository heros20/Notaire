<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
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
     *      minMessage = "Vous devez respecter {{ min }} characters minimums",
     *      maxMessage = "Vous devez respecter {{ max }} characters maximums"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Vous devez respecter {{ min }} characters minimums",
     *      maxMessage = "Vous devez respecter {{ max }} characters maximums"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Vous devez respecter {{ min }} chiffre minimums"
     * )
     */
    private $superficie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $superficieTerrain;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    
    private $price;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dpe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ges;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrePieces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbreChambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salleBain;

    /**
     * @ORM\Column(type="integer", nullable=true)
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
}
