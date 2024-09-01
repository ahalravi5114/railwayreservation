<?php
// Check if the form was submitted and if all required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['train_name']) && isset($_POST['train_number'])) {
    // Store passenger details in variables
    $trainName = $_POST['train_name'];
    $trainNumber = $_POST['train_number'];
    $passengerName = $_POST['name'];
    $passengerAge = $_POST['age'];
    $mobileNumber = $_POST['mobile'];
    $numSeats = $_POST['seats'];
    $class = $_POST['class'];
    $compartment = $_POST['compartment'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "passengerdetails";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate table name based on train name
    $tableName = str_replace(' ','_',strtolower($trainName));

    // SQL query to insert passenger details into the appropriate table
    $sql = "INSERT INTO $tableName (passengerName, passengerAge, mobileNumber, numSeats, class, compartment)
    VALUES ('$passengerName', '$passengerAge', '$mobileNumber', '$numSeats', '$class', '$compartment')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to ticket confirmation page
        header("Location: ticket_confirmation.php?train_name=$trainName&train_number=$trainNumber&passenger_name=$passengerName&passenger_age=$passengerAge&mobile_number=$mobileNumber&num_seats=$numSeats&class=$class&compartment=$compartment");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Invalid request
    header("Location: invalid_request.php");
    exit();
}
?>
