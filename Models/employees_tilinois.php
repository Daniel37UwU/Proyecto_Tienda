<?php
// Include the database connection file
include 'db_conexion.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $idem = $_POST['idem'];               // Employee ID
    $name = $_POST['name'];               // Employee name
    $position = $_POST['position'];       // Position
    $salary = $_POST['salary'];           // Salary

    // Check if all the necessary data is provided
    if (!empty($idem) && !empty($name) && !empty($position) && !empty($salary)) {
        // Call the function to update the employee
        $result = updateEmployee($idem, $name, $position, $salary);

        // Check if the update was successful
        if ($result) {
            echo "Employee successfully updated.";
            // Redirect to the index or desired page
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating the employee.";
        }
    } else {
        echo "All fields are required.";
    }
}

// Function to update the employee in the store_tilinois_db database
function updateEmployee($idem, $name, $position, $salary) {
    global $conn; // Use the database connection from 'db_conexion.php'

    // Prepare the SQL query to update the employee
    $sql = "UPDATE employees SET
                name = ?,
                position = ?,
                salary = ?,
            WHERE idem = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssdi", $name, $position, $salary, $idem);

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
