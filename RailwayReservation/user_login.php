<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "newuser";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    // Debug: Print received data
    echo "Received email: $email<br>";
    echo "Received mobile: $mobile<br>";

    if (empty($email) || empty($mobile)) {
        header("Location: user_login.php");
        exit;
    }

    $sql = "SELECT * FROM newuser WHERE email = '$email' AND mobile = '$mobile'";

    // Debug: Print SQL query
    echo "SQL query: $sql<br>";

    $result = $conn->query($sql);

    // Debug: Print query result
    var_dump($result);

    if ($result->num_rows > 0) {
        header("Location: next_page.php");
        exit;
    } else {
        $_SESSION["error"] = "Invalid email or mobile number.";
        header("Location: user_login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://images.pexels.com/photos/2101790/pexels-photo-2101790.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #0077CC;
      text-align: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #0077CC;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #005faa;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>User Login</h2>

    <?php
    if (isset($_SESSION["error"])) {
        echo "<p>{$_SESSION["error"]}</p>";
        unset($_SESSION["error"]);
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="email" name="email" placeholder="Enter email" required>
      <input type="text" name="mobile" placeholder="Enter mobile number" required>
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
