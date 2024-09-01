<?php
// Start session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: admin_login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database_passenger = "passengerdetails";

// Create connection for passenger details
$conn_passenger = new mysqli($servername, $username, $password, $database_passenger);
// Check connection
if ($conn_passenger->connect_error) {
    die("Connection failed: " . $conn_passenger->connect_error);
}

// Function to fetch passenger details for a specific train
function getPassengerDetails($conn, $trainName) {
    $tableName = str_replace(' ', '_', $trainName);
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);
    $passengerDetails = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passengerDetails[] = $row;
        }
    }
    return $passengerDetails;
}

// Get train name from URL parameter
if(isset($_GET['train_name'])) {
    $trainName = $_GET['train_name'];

    // Fetch passenger details for the selected train
    $passengerDetails = getPassengerDetails($conn_passenger, $trainName);
} else {
    // Train name not provided, redirect to admin panel
    header("Location: admin_panel.php");
    exit;
}

// Close database connection
$conn_passenger->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details - <?php echo $trainName; ?></title>
    <style>
        /* Add your CSS styles here */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/2101790/pexels-photo-2101790.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        table {
            width: 80%;
            margin-top: 20px; /* Adjust top margin as needed */
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db; /* Blue */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px; 
            color: #0077CC; /* Blue */
        }
    </style>
</head>
<body>
    <h2>Passenger Details - <?php echo $trainName; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Passenger Name</th>
                <th>Age</th>
                <th>Mobile Number</th>
                <th>Number of Seats</th>
                <th>Compartment</th>
                <th>Class</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passengerDetails as $passenger) : ?>
                <tr>
                    <td><?php echo $passenger['passengerName']; ?></td>
                    <td><?php echo $passenger['passengerAge']; ?></td>
                    <td><?php echo $passenger['mobileNumber']; ?></td>
                    <td><?php echo $passenger['numSeats']; ?></td>
                    <td><?php echo $passenger['compartment']; ?></td>
                    <td><?php echo $passenger['class']; ?></td>
                    <!-- Add more cells for additional details -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
