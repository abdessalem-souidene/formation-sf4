<?php

namespace App\Entity;

use App\Controller\PropertyRepository;
use cocour\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\{Constraint as Assert};


/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 * @UniqueEntity("title)
 */
class Property
{
    const HEAT = [
        0 => 'Electric',
        1 => 'Gaz',
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @Assert\Length(min=5,max=255)
     * @ORM\Column(type="string", length=255)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min="10, max=100")
     */
    private ?int $rooms;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $bedrooms;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $floor;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $price;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $heat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $postal_�code;

    /**
     * @Assert\Regex("\^[0-9]{5}$/")
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private bool $sold = false;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTime $created_at;
    public function __construct()
    {
        $this->created_at = new \DateTime();

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

    public function getSlug() : String
    {
        Return  (new Slugify())->$slugify->slugify($this->title);
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

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getFormattedPrice():string
    {
        return number_format($this->price,0,'',' ');
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getHeat(): ?int
    {
        return $this->heat;
    }

    public function setHeat(int $heat): self
    {
        $this->heat = $heat;

        return $this;
    }
    public function getHeatType(): string
    {
        Return self::HEAT[$this->heat];
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostal�code(): ?string
    {
        return $this->postal_�code;
    }

    public function setPostal�code(string $postal_�code): self
    {
        $this->postal_�code = $postal_�code;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
