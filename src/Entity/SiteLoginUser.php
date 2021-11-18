<?php

namespace App\Entity;

use App\Repository\SiteLoginUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteLoginUserRepository::class)
 */
class SiteLoginUser
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
    private $LoginUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\OneToOne(targetEntity=Site::class, inversedBy="IdSiteLoginUser", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginUser(): ?string
    {
        return $this->LoginUser;
    }

    public function setLoginUser(string $LoginUser): self
    {
        $this->LoginUser = $LoginUser;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

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
