<?php
// Database connection details
$host = "localhost"; // Change if using a different host
$dbname = "your_database_name"; // Replace with your database name
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if POST data exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from POST request
    $name = $_POST['name'] ?? '';
    $avatarClass = $_POST['avatarClass'] ?? '';
    $experience = $_POST['experience'] ?? 0; // Default to 0 if not set
    $item = $_POST['item'] ?? '';

    // Validate input (basic validation for demonstration)
    if (!empty($name) && !empty($avatarClass) && is_numeric($experience) && !empty($item)) {
        // Prepare SQL query
        $sql = "INSERT INTO avatars (name, avatarClass, experience, item) VALUES (?, ?, ?, ?)";

        // Initialize prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssis", $name, $avatarClass, $experience, $item);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "Data successfully inserted!";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid input. Please fill out all fields correctly.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
