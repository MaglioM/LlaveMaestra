<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $Name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $CreatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $IdUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LoginUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LoginPassword;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $CreatedBy;

    public function __construct()
    {
        $this->IdUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->IdUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->IdUser->contains($idUser)) {
            $this->IdUser[] = $idUser;
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        $this->IdUser->removeElement($idUser);

        return $this;
    }

    public function getLoginUser(): ?string
    {
        return $this->LoginUser;
    }

    public function setLoginUser(?string $LoginUser): self
    {
        $this->LoginUser = $LoginUser;

        return $this;
    }

    public function getLoginPassword(): ?string
    {
        return $this->LoginPassword;
    }

    public function setLoginPassword(?string $LoginPassword): self
    {
        $this->LoginPassword = $LoginPassword;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->CreatedBy;
    }

    public function setCreatedBy(?User $CreatedBy): self
    {
        $this->CreatedBy = $CreatedBy;

        return $this;
    }

    public function generateRandomPassword(?int $passwordLen): string
    {
	$letterSeed = 'abcdefghijklmnopqrstuvwxyzABCDEFHGIJKLMNOPQRSTUVWXYZ';
	$numberSeed = '0123456789';
	$specialSeed = '¿?¡%&$#';
	$password = '';

	for ($i = 0; $i < $passwordLen; $i++){
            $newChar = substr(str_shuffle($letterSeed), 0,1);
	    $password = $password . $newChar;
	}
	
	return $password;
    }

}
