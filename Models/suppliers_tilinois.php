<?php
// Include the database connection file
include 'db_conexion.php';

// Function to add a new supplier
function addSupplier($name, $phone, $address) {
    global $conn;
    $sql = "INSERT INTO suppliers (name, phone, address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $phone, $address);
    return $stmt->execute();
}

// Function to update an existing supplier
function updateSupplier($idprov, $name, $phone, $address) {
    global $conn;
    $sql = "UPDATE suppliers SET name = ?, phone = ?, address = ? WHERE idprov = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $phone, $address, $idprov);
    return $stmt->execute();
}

// Function to delete a supplier
function deleteSupplier($idprov) {
    global $conn;
    $sql = "DELETE FROM suppliers WHERE idprov = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idprov);
    return $stmt->execute();
}

// Function to search for a supplier by ID
function searchSupplier($idprov) {
    global $conn;
    $sql = "SELECT * FROM suppliers WHERE idprov = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idprov);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idprov = $_POST['idprov'] ?? null;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Check which operation to perform
    if (isset($_POST['add'])) {
        // Add supplier
        if (addSupplier($name, $phone, $address)) {
            echo "Supplier added successfully.";
            header("Location: suppliers_tilinois.php");
            exit();
        } else {
            echo "Error adding supplier.";
        }
    } elseif (isset($_POST['update'])) {
        // Update supplier
        if ($idprov && updateSupplier($idprov, $name, $phone, $address)) {
            echo "Supplier updated successfully.";
            header("Location: suppliers_tilinois.php");
            exit();
        } else {
            echo "Error updating supplier.";
        }
    } elseif (isset($_POST['delete'])) {
        // Delete supplier
        if ($idprov && deleteSupplier($idprov)) {
            echo "Supplier deleted successfully.";
            header("Location: suppliers_tilinois.php");
            exit();
        } else {
            echo "Error deleting supplier.";
        }
    }
}

// Example of retrieving a supplier for editing
$supplier = null;
if (isset($_GET['idprov'])) {
    $supplier = searchSupplier($_GET['idprov']);
}
?>
