<?php
class Customers
{
    private int $idc;
    private string $name;
    private ?string $address;
    private ?string $phone;
    private string $email;

    public function __construct(
        int $idc,
        string $name,
        ?string $address,
        ?string $phone,
        string $email
    ) {
        $this->idc = $idc;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getIdc(): int
    {
        return $this->idc;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getAddress(): string   
    {
        return $this->address;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setIdc(int $idc): void
    {
        $this->idc = $idc;
    }
    public function setName(string $name): void
    {   
        $this->name = $name;
    }
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}