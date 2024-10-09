<?php
// Include the database connection file
include 'db_conexion.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $iddetail = $_POST['iddetail'];       // Order detail ID
    $idpe = $_POST['idpe'];                // Order ID
    $idpro = $_POST['idpro'];              // Product ID
    $quantity = $_POST['quantity'];        // Quantity
    $price = $_POST['price'];              // Price

    // Check if all the necessary data is provided
    if (!empty($iddetail) && !empty($idpe) && !empty($idpro) && !empty($quantity) && !empty($price)) {
        // Call the function to update the order detail
        $result = updateOrderDetail($iddetail, $idpe, $idpro, $quantity, $price);

        // Check if the update was successful
        if ($result) {
            echo "Order detail successfully updated.";
            // Redirect to the index or desired page
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating the order detail.";
        }
    } else {
        echo "All fields are required.";
    }
}

// Function to update the order detail in the store_tilinois_db database
function updateOrderDetail($iddetail, $idpe, $idpro, $quantity, $price) {
    global $conn; // Use the database connection from 'db_conexion.php'

    // Prepare the SQL query to update the order detail
    $sql = "UPDATE orderdetails SET
                idpe = ?,
                idpro = ?,
                quantity = ?,
                price = ?,
            WHERE iddetail = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("iidii", $idpe, $idpro, $quantity, $price, $iddetail);

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

