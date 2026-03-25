<?php
// Instructions on how to run in XAMPP
echo "<h1>Product Listing Page</h1>";
echo "<p>To run this application, ensure that you have XAMPP installed and running. Place this file in the 'htdocs' folder of your XAMPP installation. Access it via 'http://localhost/ecommerce-lab/index.php'.</p>";

// Require database configuration
require 'config/config.php';

// Initialize database connection using MySQLi
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize search variables
$searchName = isset($_GET['searchName']) ? $_GET['searchName'] : '';
$searchCategory = isset($_GET['searchCategory']) ? $_GET['searchCategory'] : '';

// Prepare SQL statement
$sql = "SELECT * FROM products WHERE name LIKE ? AND category = ?";
$stmt = $conn->prepare($sql);
$searchName = "%$searchName%";
$stmt->bind_param("ss", $searchName, $searchCategory);
$stmt->execute();
$result = $stmt->get_result();

// Include header
include 'header.php';

echo "<div class='product-container'>";

// Check if products exist
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No products found.</p>";
}

echo "</div>";

// Include footer
include 'footer.php';

// Close database connection
$stmt->close();
$conn->close();
?>