<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reserverings")
     */
    private $kamer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reserverings")
     */
    private $user;

    /**
     * @ORM\Column(type="date")
     */
    private $checkindate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutdate;

    /**
     * @ORM\OneToOne(targetEntity=Betaal::class, cascade={"persist", "remove"})
     */
    private $betaal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalmethode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamer(): ?kamer
    {
        return $this->kamer;
    }

    public function setKamer(?kamer $kamer): self
    {
        $this->kamer = $kamer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCheckindate(): ?\DateTimeInterface
    {
        return $this->checkindate;
    }

    public function setCheckindate(\DateTimeInterface $checkindate): self
    {
        $this->checkindate = $checkindate;

        return $this;
    }

    public function getCheckoutdate(): ?\DateTimeInterface
    {
        return $this->checkoutdate;
    }

    public function setCheckoutdate(\DateTimeInterface $checkoutdate): self
    {
        $this->checkoutdate = $checkoutdate;

        return $this;
    }

    public function getBetaal(): ?betaal
    {
        return $this->betaal;
    }

    public function setBetaal(?betaal $betaal): self
    {
        $this->betaal = $betaal;

        return $this;
    }

    public function getBetaalmethode(): ?string
    {
        return $this->betaalmethode;
    }

    public function setBetaalmethode(string $betaalmethode): self
    {
        $this->betaalmethode = $betaalmethode;

        return $this;
    }
}
