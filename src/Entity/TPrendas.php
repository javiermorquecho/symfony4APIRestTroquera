<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TPrendas
 *
 * @ORM\Table(name="t_prendas")
 * @ORM\Entity
 */
class TPrendas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_t_prenda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTPrenda;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marca", type="string", length=100, nullable=true)
     */
    private $marca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_de_prenda", type="string", length=100, nullable=true)
     */
    private $tipoDePrenda;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $precio;

    public function getIdTPrenda(): ?int
    {
        return $this->idTPrenda;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(?string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getTipoDePrenda(): ?string
    {
        return $this->tipoDePrenda;
    }

    public function setTipoDePrenda(?string $tipoDePrenda): self
    {
        $this->tipoDePrenda = $tipoDePrenda;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }


}
