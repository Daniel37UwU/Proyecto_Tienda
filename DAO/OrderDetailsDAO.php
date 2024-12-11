<?php
class OrderDetailsDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(OrderDetails $orderDetail): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO orderdetails (iddet, idpe, idpro, quantity, price) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $orderDetail->getIddet(),
            $orderDetail->getIdpe(),
            $orderDetail->getIdpro(),
            $orderDetail->getQuantity(),
            $orderDetail->getPrice(),
        ]);
    }

    public function get(int $iddet): ?OrderDetails
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orderdetails WHERE iddet = ?");
        $stmt->execute([$iddet]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new OrderDetails($data['iddet'], $data['idpe'], $data['idpro'], $data['quantity'], $data['price']);
        }
        return null;
    }

    public function update(OrderDetails $orderDetail): bool
    {
        $stmt = $this->pdo->prepare("UPDATE orderdetails SET idpe = ?, idpro = ?, quantity = ?, price = ? WHERE iddet = ?");
        return $stmt->execute([
            $orderDetail->getIdpe(),
            $orderDetail->getIdpro(),
            $orderDetail->getQuantity(),
            $orderDetail->getPrice(),
            $orderDetail->getIddet(),
        ]);
    }

    public function delete(int $iddet): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM orderdetails WHERE iddet = ?");
        return $stmt->execute([$iddet]);
    }
}
?>
