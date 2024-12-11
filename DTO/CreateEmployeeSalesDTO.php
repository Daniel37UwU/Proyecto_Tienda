<? php
function createEmployeeSalesDTO(Employee $employee): EmployeeSalesDTO {
    $totalSales = count($employee->getSales());
    $totalRevenue = array_reduce($employee->getSales(), function($sum, Sale $sale) {
        return $sum + $sale->getAmount();
    }, 0);

    $salesDetails = array_map(function(Sale $sale) {
        return new SaleDetailDTO(
            $sale->getId(),
            $sale->getCustomer()->getName(),
            $sale->getAmount(),
            $sale->getDate()
        );
    }, $employee->getSales());

    return new EmployeeSalesDTO(
        $employee->getId(),
        $employee->getName(),
        $employee->getPosition(),
        $totalSales,
        $totalRevenue,
        $salesDetails
    );
}

