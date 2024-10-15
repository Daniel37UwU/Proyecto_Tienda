<?php
class Orders
{
    private int $idpe;
    private ?int $idc;
    private string $orderDate;
    private float $total;

    public function __construct(
        int $idpe,
        ?int $idc,
        string $orderDate,
        float $total
    ) {
        $this->idpe = $idpe;
        $this->idc = $idc;
        $this->orderDate = $orderDate;
        $this->total = $total;
    }

    public function getIdpe(): int
    {
        return $this->idpe;
    }
    public function getIdc(): ?int
    {
        return $this->idc;
    }
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }
    public function getTotal(): float
    {
        return $this->total;
    }

    public function setIdpe(int $idpe): void
    {
        $this->idpe = $idpe;
    }
    public function setIdc(?int $idc): void
    {
        $this->idc = $idc;
    }
    public function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
    }
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }
}