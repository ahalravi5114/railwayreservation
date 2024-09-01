<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.pexels.com/photos/2101790/pexels-photo-2101790.jpeg');
           background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .ticket {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 250px;
            height: auto;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #0077CC;
            margin-top: 0;
        }

        .details {
            margin-top: 20px;
        }

        .details h2 {
            margin: 0;
            color: #333;
            font-size: 16px;
            line-height: 1.5;
            font-weight: normal;
        }

        .print-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #0077CC;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="logo">
            <img src="https://d3lzcn6mbbadaf.cloudfront.net/media/details/EYnGbHuVcAA8RIq.jpg" alt="Train Logo">
        </div>
        <h1>Ticket Confirmation</h1>

        <div class="details">
            <?php
            // Check if all required parameters are set
            if (isset($_GET['train_name']) && isset($_GET['train_number']) && isset($_GET['passenger_name']) && isset($_GET['passenger_age']) && isset($_GET['mobile_number']) && isset($_GET['num_seats']) && isset($_GET['class']) && isset($_GET['compartment'])) {
                // Retrieve passenger details from URL parameters
                $trainName = $_GET['train_name'];
                $trainNumber = $_GET['train_number'];
                $passengerName = $_GET['passenger_name'];
                $passengerAge = $_GET['passenger_age'];
                $mobileNumber = $_GET['mobile_number'];
                $numSeats = $_GET['num_seats'];
                $class = $_GET['class'];
                $compartment = $_GET['compartment'];

                // Display the ticket details
                echo "<h2>Train Name: $trainName</h2>";
                echo "<h2>Train Number: $trainNumber</h2>";
                echo "<h2>Passenger Name: $passengerName</h2>";
                echo "<h2>Passenger Age: $passengerAge</h2>";
                echo "<h2>Mobile Number: $mobileNumber</h2>";
                echo "<h2>Number of Seats: $numSeats</h2>";
                echo "<h2>Class: $class</h2>";
                echo "<h2>Compartment: $compartment</h2>";
            } else {
                // Error message if required parameters are missing
                echo "<p>Error: Required parameters missing.</p>";
            }
            ?>
        </div>

        <button class="print-btn" onclick="window.print()">Print</button>
    </div>
</body>
</html>


