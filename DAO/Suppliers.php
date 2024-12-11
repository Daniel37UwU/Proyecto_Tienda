<?php
class SuppliersDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Suppliers $supplier): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO suppliers (idprov, name, phone, address) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $supplier->getIdprov(),
            $supplier->getName(),
            $supplier->getPhone(),
            $supplier->getAddress(),
        ]);
    }

    public function get(int $idprov): ?Suppliers
    {
        $stmt = $this->pdo->prepare("SELECT * FROM suppliers WHERE idprov = ?");
        $stmt->execute([$idprov]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Suppliers($data['idprov'], $data['name'], $data['phone'], $data['address']);
        }
        return null;
    }

    public function update(Suppliers $supplier): bool
    {
        $stmt = $this->pdo->prepare("UPDATE suppliers SET name = ?, phone = ?, address = ? WHERE idprov = ?");
        return $stmt->execute([
            $supplier->getName(),
            $supplier->getPhone(),
            $supplier->getAddress(),
            $supplier->getIdprov(),
        ]);
    }

    public function delete(int $idprov): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM suppliers WHERE idprov = ?");
        return $stmt->execute([$idprov]);
    }
}
?>
