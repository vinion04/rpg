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

// SQL query to retrieve all data from user_data table
$sql = "SELECT * FROM avatars";
$result = mysqli_query($conn, $sql);

// Check if the query was successful and if there are rows
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch and display each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . htmlspecialchars($row['id']) . "\n";
        echo "Name: " . htmlspecialchars($row['name']) . "\n";
        echo "Avatar Class: " . htmlspecialchars($row['avatarClass']) . "\n";
        echo "Experience: " . htmlspecialchars($row['experience']) . "\n";
        echo "Item: " . htmlspecialchars($row['item']) . "\n";
        echo "------------------------\n"; // Divider between rows
    }
} else {
    echo "No data found in the user_data table.";
}

// Close the database connection
mysqli_close($conn);
?>
