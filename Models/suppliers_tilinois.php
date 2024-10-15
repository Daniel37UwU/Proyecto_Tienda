<?php
class Suppliers
{
    private int $idprov;
    private string $name;
    private ?string $phone;
    private ?string $address;

    public function __construct(
        int $idprov,
        string $name,
        ?string $phone = null,
        ?string $address = null
    ) {
        $this->idprov = $idprov;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getIdprov(): int
    {
        return $this->idprov;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setIdprov(int $idprov): void
    {
        $this->idprov = $idprov;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }
}