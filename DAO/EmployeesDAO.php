<?php
class EmployeesDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Employees $employee): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO employees (idem, name, position, salary) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $employee->getIdem(),
            $employee->getName(),
            $employee->getPosition(),
            $employee->getSalary(),
        ]);
    }

    public function get(int $idem): ?Employees
    {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE idem = ?");
        $stmt->execute([$idem]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Employees($data['idem'], $data['name'], $data['position'], $data['salary']);
        }
        return null;
    }

    public function update(Employees $employee): bool
    {
        $stmt = $this->pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE idem = ?");
        return $stmt->execute([
            $employee->getName(),
            $employee->getPosition(),
            $employee->getSalary(),
            $employee->getIdem(),
        ]);
    }

    public function delete(int $idem): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE idem = ?");
        return $stmt->execute([$idem]);
    }
}
?>
