<? php
class EmployeeSalesDTO {
    private int $employeeId;
    private string $employeeName;
    private string $employeePosition;
    private int $totalSales;
    private float $totalRevenue;
    private array $salesDetails;

    public function __construct(int $employeeId, string $employeeName, string $employeePosition, int $totalSales, float $totalRevenue, array $salesDetails) {
        $this->employeeId = $employeeId;
        $this->employeeName = $employeeName;
        $this->employeePosition = $employeePosition;
        $this->totalSales = $totalSales;
        $this->totalRevenue = $totalRevenue;
        $this->salesDetails = $salesDetails;
    }

    public function getEmployeeId(): int {
        return $this->employeeId;
    }

    public function getEmployeeName(): string {
        return $this->employeeName;
    }

    public function getEmployeePosition(): string {
        return $this->employeePosition;
    }

    public function getTotalSales(): int {
        return $this->totalSales;
    }

    public function getTotalRevenue(): float {
        return $this->totalRevenue;
    }

    public function getSalesDetails(): array {
        return $this->salesDetails;
    }
}
