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
$database_train = "traindetails";
$database_passenger = "passengerdetails";

// Create connection for train details
$conn_train = new mysqli($servername, $username, $password, $database_train);
// Check connection
if ($conn_train->connect_error) {
    die("Connection failed: " . $conn_train->connect_error);
}

// Function to fetch train details from database
function getTrainDetails($conn) {
    $sql = "SELECT * FROM traindetails";
    $result = $conn->query($sql);
    $trainDetails = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $trainDetails[] = $row;
        }
    }
    return $trainDetails;
}

// Fetch train details
$trainDetails = getTrainDetails($conn_train);

// Close database connection
$conn_train->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2, h3 {
            text-align: center;
            color: #0077CC; /* Blue */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #3498db; /* Blue */
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <h3>Train Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Train Name</th>
                    <th>Train Number</th>
                    <th>Departure</th>
                    <th>Destination</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>
                    <th>Number of Seats</th>
                    <th>Departure</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trainDetails as $train) : ?>
                    <tr>
                        <td><?php echo $train['train_name']; ?></td>
                        <td><?php echo $train['train_number']; ?></td>
                        <td><?php echo $train['departure']; ?></td>
                        <td><?php echo $train['destination']; ?></td>
                        <td><?php echo $train['arrival_time']; ?></td>
                        <td><?php echo $train['departure_time']; ?></td>
                        <td><?php echo $train['number_of_seats']; ?></td>
                        <td><?php echo $train['departure']; ?></td>
                        <td>
                            <a href="view_passengers.php?train_name=<?php echo urlencode($train['train_name']); ?>">View Passengers</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </form>
    </div>
</body>
</html>

