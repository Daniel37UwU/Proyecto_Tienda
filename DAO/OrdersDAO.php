<?php
class OrdersDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Orders $order): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO orders (idpe, idc, orderDate, total) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $order->getIdpe(),
            $order->getIdc(),
            $order->getOrderDate(),
            $order->getTotal(),
        ]);
    }

    public function get(int $idpe): ?Orders
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE idpe = ?");
        $stmt->execute([$idpe]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Orders($data['idpe'], $data['idc'], $data['orderDate'], $data['total']);
        }
        return null;
    }

    public function update(Orders $order): bool
    {
        $stmt = $this->pdo->prepare("UPDATE orders SET idc = ?, orderDate = ?, total = ? WHERE idpe = ?");
        return $stmt->execute([
            $order->getIdc(),
            $order->getOrderDate(),
            $order->getTotal(),
            $order->getIdpe(),
        ]);
    }

    public function delete(int $idpe): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM orders WHERE idpe = ?");
        return $stmt->execute([$idpe]);
    }
}
?>
