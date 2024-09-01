<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Search Results</title>
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

        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db; /* Blue */
            color: white; /* White text */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h1 {
            color: #0077CC; /* Blue */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Train Search Results</h1>
        <?php
        function sanitizeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "traindetails";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $searchFrom = "";
        $searchTo = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["from"]) && isset($_GET["to"])) {
            $searchFrom = sanitizeInput($_GET["from"]);
            $searchTo = sanitizeInput($_GET["to"]);

            // SQL query to fetch train details based on search criteria
            $sql = "SELECT * FROM traindetails WHERE departure LIKE '%$searchFrom%' AND destination LIKE '%$searchTo%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Train Name</th><th>Train Number</th><th>Departure</th><th>Destination</th><th>Departure Time</th><th>Arrival Time</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["train_name"] . "</td>";
                    echo "<td>" . $row["train_number"] . "</td>";
                    echo "<td>" . $row["departure"] . "</td>";
                    echo "<td>" . $row["destination"] . "</td>";
                    echo "<td>" . $row["departure_time"] . "</td>";
                    echo "<td>" . $row["arrival_time"] . "</td>";
                    echo "<td><a href='ticket.php?train_name=" . $row['train_name'] . "&train_number=" . $row['train_number'] . "'>Book</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
        } else {
            echo "<p>Please enter both 'From' and 'To' stations to search for train details.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>



