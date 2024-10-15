<?php
class OrderDetails
{
    private int $iddet;
    private int $idpe;
    private int $idpro;
    private int $quantity;
    private float $price;

    public function __construct(
        int $iddet,
        int $idpe,
        int $idpro,
        int $quantity,
        float $price
    ) {
        $this->iddet = $iddet;
        $this->idpe = $idpe;
        $this->idpro = $idpro;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getIddet(): int
    {
        return $this->iddet;
    }
    public function getIdpe(): int
    {
        return $this->idpe;
    }
    public function getIdpro(): int
    {
        return $this->idpro;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    public function setIddet(int $iddet): void
    {
        $this->iddet = $iddet;
    }
    public function setIdpe(int $idpe): void
    {
        $this->idpe = $idpe;
    }
    public function setIdpro(int $idpro): void
    {
        $this->idpro = $idpro;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}