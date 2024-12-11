<? php
function createOrderSummaryDTO(Order $order): OrderSummaryDTO {
    $customer = $order->getCustomer();
    $productDetails = array_map(function(Product $product) {
        return new ProductDetailDTO(
            $product->getId(),
            $product->getName(),
            $product->getQuantity(),
            $product->getPrice()
        );
    }, $order->getProducts());

    return new OrderSummaryDTO(
        $order->getId(),
        $order->getDate(),
        $customer->getName(),
        $customer->getEmail(),
        $productDetails
    );
}
