<? php
class OrderSummaryDTO {
    private int $orderId;
    private string $orderDate;
    private string $customerName;
    private string $customerEmail;
    private array $productDetails;

    public function __construct(int $orderId, string $orderDate, string $customerName, string $customerEmail, array $productDetails) {
        $this->orderId = $orderId;
        $this->orderDate = $orderDate;
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->productDetails = $productDetails;
    }

    // Métodos getters para acceder a los atributos si es necesario
    public function getOrderId(): int {
        return $this->orderId;
    }

    public function getOrderDate(): string {
        return $this->orderDate;
    }

    public function getCustomerName(): string {
        return $this->customerName;
    }

    public function getCustomerEmail(): string {
        return $this->customerEmail;
    }

    public function getProductDetails(): array {
        return $this->productDetails;
    }
}
