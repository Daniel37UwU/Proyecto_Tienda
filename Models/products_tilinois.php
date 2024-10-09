clude the database connection file
include 'db_conexion.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $idpro = $_POST['idpro'];              // Product ID
    $name = $_POST['name'];                // Product name
    $description = $_POST['description'];  // Product description
    $price = $_POST['price'];              // Product price
    $category = $_POST['category'];        // Product category
    $brand = $_POST['brand'];              // Product brand
    $stock = $_POST['uniStock'];           // Units in stock

    // Check if all the necessary data is provided
    if (!empty($idpro) && !empty($name) && !empty($description) && !empty($price) && !empty($category) && !empty($brand) && !empty($stock)) {
        // Call the function to update the product
        $result = updateProduct($idpro, $name, $description, $price, $category, $brand, $stock);

        // Check if the update was successful
        if ($result) {
            echo "Product successfully updated.";
            // Redirect to the index or desired page
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating the product.";
        }
    } else {
        echo "All fields are required.";
    }
}

// Function to update the product in the store_tilinois_db database
function updateProduct($idpro, $name, $description, $price, $category, $brand, $stock) {
    global $conn; // Use the database connection from 'db_conexion.php'

    // Prepare the SQL query to update the product
    $sql = "UPDATE products SET
                name = ?,
                description = ?,
                price = ?,
                category = ?,
                brand = ?,
                uniStock = ?
            WHERE idpro = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssdsdii", $name, $description, $price, $category, $brand, $stock, $idpro);

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

