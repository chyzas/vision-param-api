<?php

namespace App\Entity;

use App\Repository\VariantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VariantRepository::class)]
class Variant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\ManyToOne(inversedBy: 'variants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ParameterOption $parameterOption = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getParameterOption(): ?ParameterOption
    {
        return $this->parameterOption;
    }

    public function setParameterOption(?ParameterOption $parameterOption): self
    {
        $this->parameterOption = $parameterOption;

        return $this;
    }
}
