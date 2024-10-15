<?php
class Employees
{
    private int $idem;
    private string $name;
    private string $position;
    private float $salary;

    public function __construct(
        int $idem,
        string $name,
        string $position,
        float $salary
    ) {
        $this->idem = $idem;
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getIdem(): int
    {
        return $this->idem;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPosition(): string
    {
        return $this->position;
    }
    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setIdem(int $idem): void
    {
        $this->idem = $idem;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }
}