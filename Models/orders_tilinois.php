<?php
// Include the database connection file
include 'db_conexion.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $idpe = $_POST['idpe'];                // Order ID
    $idc = $_POST['idc'];                  // Customer ID
    $orderDate = $_POST['orderdate'];      // Order date
    $total = $_POST['total'];               // Total amount

    // Check if all the necessary data is provided
    if (!empty($idpe) && !empty($idc) && !empty($orderDate) && !empty($total)) {
        // Call the function to update the order
        $result = updateOrder($idpe, $idc, $orderDate, $total);

        // Check if the update was successful
        if ($result) {
            echo "Order successfully updated.";
            // Redirect to the index or desired page
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating the order.";
        }
    } else {
        echo "All fields are required.";
    }
}

// Function to update the order in the store_tilinois_db database
function updateOrder($idpe, $idc, $orderDate, $total) {
    global $conn; // Use the database connection from 'db_conexion.php'

    // Prepare the SQL query to update the order
    $sql = "UPDATE orders SET
                idc = ?,
                orderdate = ?,
                total = ?,
            WHERE idpe = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("isdi", $idc, $orderDate, $total, $idpe);

        // Execute the query
        if ($stmt->execute()) {
            return true; // Update was successful
        } else {
            return false; // Error executing the query
        }
    } else {
        return false; // Error preparing the query
    }
}
?>

