<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = "chirag"; 
$dbname = "my_database"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name from the form
    $name = $conn->real_escape_string($_POST['name']); 

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO cute_table (name) VALUES (?)");
    $stmt->bind_param("s", $name);  // "s" means the variable is a string

    // Execute the query
    if ($stmt->execute()) {
        echo "Thank you, $name! Your data has been added successfully.";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch and display all names from the database
$sql_fetch = "SELECT name FROM cute_table"; 
$result = $conn->query($sql_fetch); 

if ($result->num_rows > 0) {
    echo "<h2>Submitted Names:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>
