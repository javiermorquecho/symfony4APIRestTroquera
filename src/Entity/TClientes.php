<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TClientes
 *
 * @ORM\Table(name="t_clientes")
 * @ORM\Entity
 */
class TClientes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_t_cliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTCliente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="paterno", type="string", length=80, nullable=true)
     */
    private $paterno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="materno", type="string", length=80, nullable=true)
     */
    private $materno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="credito_interno", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $creditoInterno;

    /**
     * @var int|null
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    public function getIdTCliente(): ?int
    {
        return $this->idTCliente;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPaterno(): ?string
    {
        return $this->paterno;
    }

    public function setPaterno(?string $paterno): self
    {
        $this->paterno = $paterno;

        return $this;
    }

    public function getMaterno(): ?string
    {
        return $this->materno;
    }

    public function setMaterno(?string $materno): self
    {
        $this->materno = $materno;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreditoInterno()
    {
        return $this->creditoInterno;
    }

    public function setCreditoInterno($creditoInterno): self
    {
        $this->creditoInterno = $creditoInterno;

        return $this;
    }

    public function getActivo(): ?int
    {
        return $this->activo;
    }

    public function setActivo(?int $activo): self
    {
        $this->activo = $activo;

        return $this;
    }


}
