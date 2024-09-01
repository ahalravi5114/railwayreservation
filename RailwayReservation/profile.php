<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "newuser";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM newuser WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Mobile: " . $row["mobile"] . "</p>";
    }
} else {
    echo "<p>No results</p>";
}

$conn->close();
?>