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
    // Get form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    if (empty($name) || empty($age) || empty($gender) || empty($email) || empty($mobile)) {
        header("Location: register.php");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO newuser (name, age, gender, email, mobile) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        $_SESSION["error"] = "Error preparing SQL statement: " . $conn->error;
        header("Location: register.php");
        exit;
    }

    $stmt->bind_param("sisss", $name, $age, $gender, $email, $mobile);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Registration successful. You can now login.";
        header("Location: next_page.php");
        exit;
    } else {
        $_SESSION["error"] = "Registration failed. Please try again later.";
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Reservation System - New User Registration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/2101790/pexels-photo-2101790.jpeg');
           background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0077CC; 
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group select {
            padding: 8px 30px 8px 8px; /* Adjust padding to accommodate arrow */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 6l8 8 8-8H4z"/></svg>'); /* Arrow icon */
            background-repeat: no-repeat;
            background-position: right 8px top 50%;
            background-size: 12px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .form-group input[type="submit"] {
            width: auto; /* Adjust width as needed */
            margin-top: 10px;
            background-color: #0077CC;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #005faa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <?php
        if (isset($_SESSION["success"])) {
            echo "<p>{$_SESSION["success"]}</p>";
            unset($_SESSION["success"]);
        } elseif (isset($_SESSION["error"])) {
            echo "<p>{$_SESSION["error"]}</p>";
            unset($_SESSION["error"]);
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
                    <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Register">
        </div>
    </form>
</div>
</body>
</html>


