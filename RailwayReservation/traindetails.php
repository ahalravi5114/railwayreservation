<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.pexels.com/photos/2101790/pexels-photo-2101790.jpeg');
           background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

        }

        nav {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 12px; 
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #27ae60; 
        }

        .container {
            margin: 20px auto;
            max-width: 800px; 
            background-color: #fff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f2f2f2; 
            color: #333; 
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd; 
        }

        th {
            background-color: #3498db; 
            color: #fff; 
        }

        form {
            margin-bottom: 20px;
        }

        label {
            color: #2980b9; 
        }

        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #2980b9; 
            color: #fff; 
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1a5276; /* Dark blue hover background */
        }

        /* Train logo styles */
        .train-logo {
            display: block;
            margin: 20px auto 10px; /* Adjust margin for spacing */
            width: 150px; /* Reduce width of the logo */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Add border radius */
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); /* Add box shadow */
        }

        h1 {
            text-align: center; /* Center align heading */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><img class="train-logo" src="https://d3lzcn6mbbadaf.cloudfront.net/media/details/EYnGbHuVcAA8RIq.jpg" alt="Railway Reservation System Logo"> Train Details</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="search">Search Train:</label>
            <input type="textbox" id="search" name="search" placeholder="Enter train name or number">
            <input type="submit" value="Search">
        </form>
        <?php
            $servername = "localhost";
$username = "root";
$password = "";
$database = "traindetails";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize variables
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $search = sanitizeInput($_GET["search"]);
}


$sql = "SELECT * FROM traindetails WHERE train_name LIKE '%$search%' OR train_number LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Train Name</th><th>Train Number</th><th>Departure</th><th>Destination</th><th>Departure Time</th><th>Arrival Time</th><th>Available seats</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["train_name"] . "</td>";
        echo "<td>" . $row["train_number"] . "</td>";
        echo "<td>" . $row["departure"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
        echo "<td>" . $row["departure_time"] . "</td>";
        echo "<td>" . $row["arrival_time"] . "</td>";
        echo "<td>" . $row["number_of_seats"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

$conn->close();
?>
    </div>
</body>
</html>

