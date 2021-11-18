<?php

namespace App\Entity;

use App\Repository\SiteLoginPasswordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteLoginPasswordRepository::class)
 */
class SiteLoginPassword
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $CharAmount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SpecialChar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Mayus;

    /**
     * @ORM\OneToOne(targetEntity=Site::class, inversedBy="IdSiteLoginPassword", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharAmount(): ?int
    {
        return $this->CharAmount;
    }

    public function setCharAmount(int $CharAmount): self
    {
        $this->CharAmount = $CharAmount;

        return $this;
    }

    public function getSpecialChar(): ?bool
    {
        return $this->SpecialChar;
    }

    public function setSpecialChar(bool $SpecialChar): self
    {
        $this->SpecialChar = $SpecialChar;

        return $this;
    }

    public function getMayus(): ?bool
    {
        return $this->Mayus;
    }

    public function setMayus(bool $Mayus): self
    {
        $this->Mayus = $Mayus;

        return $this;
    }

    public function getIdSite(): ?Site
    {
        return $this->IdSite;
    }

    public function setIdSite(Site $IdSite): self
    {
        $this->IdSite = $IdSite;

        return $this;
    }
}
