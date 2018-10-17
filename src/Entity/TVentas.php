<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TVentas
 *
 * @ORM\Table(name="t_ventas")
 * @ORM\Entity
 */
class TVentas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_t_venta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTVenta;

    /**
     * @var int
     *
     * @ORM\Column(name="id_t_cliente", type="integer", nullable=false)
     */
    private $idTCliente;

    /**
     * @var int
     *
     * @ORM\Column(name="id_t_prenda", type="integer", nullable=false)
     */
    private $idTPrenda;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="credito_interno_usado", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $creditoInternoUsado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_venta", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $totalVenta;

    public function getIdTVenta(): ?int
    {
        return $this->idTVenta;
    }

    public function getIdTCliente(): ?int
    {
        return $this->idTCliente;
    }

    public function setIdTCliente(int $idTCliente): self
    {
        $this->idTCliente = $idTCliente;

        return $this;
    }

    public function getIdTPrenda(): ?int
    {
        return $this->idTPrenda;
    }

    public function setIdTPrenda(int $idTPrenda): self
    {
        $this->idTPrenda = $idTPrenda;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(?\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getCreditoInternoUsado()
    {
        return $this->creditoInternoUsado;
    }

    public function setCreditoInternoUsado($creditoInternoUsado): self
    {
        $this->creditoInternoUsado = $creditoInternoUsado;

        return $this;
    }

    public function getTotalVenta()
    {
        return $this->totalVenta;
    }

    public function setTotalVenta($totalVenta): self
    {
        $this->totalVenta = $totalVenta;

        return $this;
    }


}
