<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search Trains </title>
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
            margin: 50px auto;
            padding: 20px;
            max-width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: left;
            color: #0077CC;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #0077CC;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005faa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Trains</h1>
        <form action="search_results.php" method="get">
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>

            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>



