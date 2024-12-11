<? php
class SaleDetailDTO {
    private int $saleId;
    private string $customerName;
    private float $amount;
    private string $date;

    public function __construct(int $saleId, string $customerName, float $amount, string $date) {
        $this->saleId = $saleId;
        $this->customerName = $customerName;
        $this->amount = $amount;
        $this->date = $date;
    }

    public function getSaleId(): int {
        return $this->saleId;
    }

    public function getCustomerName(): string {
        return $this->customerName;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDate(): string {
        return $this->date;
    }
}
