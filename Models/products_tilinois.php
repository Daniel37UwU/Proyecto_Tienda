<?php
class Products
{
    private int $idpro;
    private string $name;
    private string $description;
    private float $price;
    private string $category;
    private string $brand;
    private int $stockUnits;

    public function __construct(
        int $idpro,
        string $name,
        string $description,
        float $price,
        string $category,
        string $brand,
        int $stockUnits)
    {
        $this->idpro = $idpro;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->brand = $brand;
        $this->stockUnits = $stockUnits;
        }

    public function getIdpro(): int
    {   
        return $this->idpro;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getCategory(): string
    {
        return $this->category;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getStockUnits(): int
    {
        return $this->stockUnits;
    }

    public function setIdpro (int $idpro): void
    {
        $this->idpro = $idpro;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    public function setStockUnits(int $stockUnits): void
    {
        $this->stockUnits = $stockUnits;
    }
}