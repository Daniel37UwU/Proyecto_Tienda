<? php
class ProductDetailDTO {
    private int $productId;
    private string $productName;
    private int $quantity;
    private float $price;

    public function __construct(int $productId, string $productName, int $quantity, float $price) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getProductId(): int {
        return $this->productId;
    }

    public function getProductName(): string {
        return $this->productName;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }
}
