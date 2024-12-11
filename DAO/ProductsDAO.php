<?php
class ProductsDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Products $product): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (idpro, name, description, price, category, brand, stockUnits) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $product->getIdpro(),
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getCategory(),
            $product->getBrand(),
            $product->getStockUnits(),
        ]);
    }

    public function get(int $idpro): ?Products
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE idpro = ?");
        $stmt->execute([$idpro]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Products($data['idpro'], $data['name'], $data['description'], $data['price'], $data['category'], $data['brand'], $data['stockUnits']);
        }
        return null;
    }

    public function update(Products $product): bool
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, category = ?, brand = ?, stockUnits = ? WHERE idpro = ?");
        return $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getCategory(),
            $product->getBrand(),
            $product->getStockUnits(),
            $product->getIdpro(),
        ]);
    }

    public function delete(int $idpro): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE idpro = ?");
        return $stmt->execute([$idpro]);
    }
}
?>
