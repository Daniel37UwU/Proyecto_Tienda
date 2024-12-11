<?php
class CustomersDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Customers $customer): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO customers (idc, name, address, phone, email) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $customer->getIdc(),
            $customer->getName(),
            $customer->getAddress(),
            $customer->getPhone(),
            $customer->getEmail(),
        ]);
    }

    public function get(int $idc): ?Customers
    {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE idc = ?");
        $stmt->execute([$idc]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Customers($data['idc'], $data['name'], $data['address'], $data['phone'], $data['email']);
        }
        return null;
    }

    public function update(Customers $customer): bool
    {
        $stmt = $this->pdo->prepare("UPDATE customers SET name = ?, address = ?, phone = ?, email = ? WHERE idc = ?");
        return $stmt->execute([
            $customer->getName(),
            $customer->getAddress(),
            $customer->getPhone(),
            $customer->getEmail(),
            $customer->getIdc(),
        ]);
    }

    public function delete(int $idc): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE idc = ?");
        return $stmt->execute([$idc]);
    }
}
?>

