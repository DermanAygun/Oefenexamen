<?php

namespace App\Entity;

use App\Repository\ExtrasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtrasRepository::class)
 */
class Extras
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="float")
     */
    private $meerprijs;

    /**
     * @ORM\ManyToMany(targetEntity=Kamer::class, inversedBy="extras")
     */
    private $kamer;

    public function __construct()
    {
        $this->kamer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getMeerprijs(): ?float
    {
        return $this->meerprijs;
    }

    public function setMeerprijs(float $meerprijs): self
    {
        $this->meerprijs = $meerprijs;

        return $this;
    }

    /**
     * @return Collection|kamer[]
     */
    public function getKamer(): Collection
    {
        return $this->kamer;
    }

    public function addKamer(kamer $kamer): self
    {
        if (!$this->kamer->contains($kamer)) {
            $this->kamer[] = $kamer;
        }

        return $this;
    }

    public function removeKamer(kamer $kamer): self
    {
        if ($this->kamer->contains($kamer)) {
            $this->kamer->removeElement($kamer);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getOmschrijving();
    }
}
