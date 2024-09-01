<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Reservation System - Home</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        nav {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav img {
            height: 100px; 
            width: 200px;
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
            background-color: #2980b9; 
        }

        .container {
            margin: 20px;
        }

        .hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #0077CC; 
        }

        .hero p {
            font-size: 18px;
            color: #666;
        }

        /* Image carousel styles */
        #carousel-container {
            overflow: hidden;
            margin-bottom: 20px;
        }

        #carousel {
            white-space: nowrap;
        }

        #carousel img {
            width: 300px; /* Adjusted width */
            height: auto; /* Adjusted height */
            display: inline-block;
            vertical-align: middle;
        }

        /* Section styles */
        section {
            margin-bottom: 40px;
        }

        section h2 {
            font-size: 24px;
            color: #3498db; /* Blue */
            margin-bottom: 10px;
        }

        section p {
            font-size: 16px;
            color: #444;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <img src="https://d3lzcn6mbbadaf.cloudfront.net/media/details/EYnGbHuVcAA8RIq.jpg" alt="Railway Reservation System Logo">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="book_ticket.php">Book Ticket</a></li>
            <li><a href="traindetails.php">Train Details</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>
<div class="container">
        <div class="hero">
            <h1>Welcome to Railway Reservation System</h1>
            <p>Your one-stop destination for booking train tickets!</p>
        </div>

    <div id="carousel-container">
            <div id="carousel">
                <img src="https://media.istockphoto.com/id/1189029599/photo/passenger-train-india.jpg?s=612x612&w=0&k=20&c=gO7cJw0zhVhVrQ4DIG_Tr0llD52_dS-DKsWU43CWiXs=" alt="Train Image 2">
                <img src="https://media.istockphoto.com/id/1026143912/photo/loss-making-indian-railways-struggling-to-maintain.jpg?s=2048x2048&w=is&k=20&c=MwIAzDaJZGe8p3jOkmXEnzOkxcTqGndmBaHtytTuCNI=" alt="Train Image 3">
                <img src="https://media.istockphoto.com/id/1160901902/photo/travelling-in-train-and-passing-through-castle-rock-station-in-the-konkan-railways-section-of.jpg?s=1024x1024&w=is&k=20&c=ZuXVHrJLi8-nnIDYkynUDBNmF6jUF97w8zKmtcUFW9M=" alt="Train Image 4">
                <img src="https://media.istockphoto.com/id/1318904590/photo/train-parked-in-station.jpg?s=2048x2048&w=is&k=20&c=JiQM4GgTPUHbAjO6oftMYjvEABmytCSc2cgKJRJiGfQ=" alt="Train Image 5">
                <img src="https://media.istockphoto.com/id/1272272361/photo/commuter-trains-india.jpg?s=2048x2048&w=is&k=20&c=xKp_yuxovPbtrGaSB2WwSFm89hYTOIPXU-8KKdfQSNE=" alt="Train Image 6">
            </div>
        </div>

        <!-- About Us Section -->
        <section>
            <h2>About Us</h2>
            <p>Welcome to our Railway Reservation System! We provide a convenient platform for booking train tickets for your journeys. Whether you're planning a short trip or a long adventure, we've got you covered.</p>
        </section>

        <!-- How It Works Section -->
        <section>
            <h2>How It Works</h2>
            <p>Booking your train tickets with us is easy. Just follow these simple steps:</p>
            <ol>
                <li>Sign in to your account or create a new one.</li>
                <li>Select your departure and destination stations.</li>
                <li>Choose your travel dates and preferred train.</li>
                <li>Review your booking details and confirm your reservation.</li>
                <li>Pay securely online and receive your ticket confirmation.</li>
                <li>Enjoy your journey!</li>
            </ol>
        </section>

        <!-- Contact Us Section -->
        <section>
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out to our customer support team. We're here to help you make your train travel experience as smooth as possible.</p>
            <p>Email: support@railwayreservation.com</p>
            <p>Phone: 1-800-123-4567</p>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 Railway Reservation System
    </footer>
    </script>
</body>
</html>












