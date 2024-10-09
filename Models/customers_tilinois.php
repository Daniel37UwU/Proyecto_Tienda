<?php
// Include the database connection file
include 'db_conexion.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $idc = $_POST['idc'];                  // Customer ID
    $name = $_POST['name'];                // Customer name
    $address = $_POST['address'];          // Customer address
    $phone = $_POST['phone'];              // Customer phone
    $email = $_POST['email'];              // Customer email

    // Check if all the necessary data is provided
    if (!empty($idc) && !empty($name) && !empty($address) && !empty($phone) && !empty($email)) {
        // Call the function to update the customer
        $result = updateCustomer($idc, $name, $address, $phone, $email);

        // Check if the update was successful
        if ($result) {
            echo "Customer successfully updated.";
            // Redirect to the index or desired page
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating the customer.";
        }
    } else {
        echo "All fields are required.";
    }
}

// Function to update the customer in the store_tilinois_db database
function updateCustomer($idc, $name, $address, $phone, $email) {
    global $conn; // Use the database connection from 'db_conexion.php'

    // Prepare the SQL query to update the customer
    $sql = "UPDATE customers SET
                name = ?,
                address = ?,
                phone = ?,
                email = ?,
            WHERE idc = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssssi", $name, $address, $phone, $email, $idc);

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
