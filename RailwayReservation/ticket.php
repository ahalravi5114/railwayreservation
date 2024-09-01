<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Train Ticket</title>
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

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
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

        #card_details {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Train Ticket</h1>
        <?php
        if (isset($_GET['train_name']) && isset($_GET['train_number'])) {
            $trainName = $_GET['train_name'];
            $trainNumber = $_GET['train_number'];
            echo "<h2>Train Name: $trainName</h2>";
            echo "<h2>Train Number: $trainNumber</h2>";
        }
        ?>

        <form id="booking_form" action="process_booking.php" method="POST">
            <input type="hidden" name="train_name" value="<?php echo htmlspecialchars($trainName); ?>">
            <input type="hidden" name="train_number" value="<?php echo htmlspecialchars($trainNumber); ?>">

            <label for="name">Passenger Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Passenger Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="seats">Number of Seats:</label>
            <input type="number" id="seats" name="seats" required>

            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <option value="All Classes">All Classes</option>
                <option value="Anubhuti Class (EA)">Anubhuti Class (EA)</option>
                <option value="AC First Class (1A)">AC First Class (1A)</option>
                <option value="Vistadome AC (EV)">Vistadome AC (EV)</option>
                <option value="Exec. Chair Car (EC)">Exec. Chair Car (EC)</option>
                <option value="AC 2 Tier (2A)">AC 2 Tier (2A)</option>
                <option value="First Class (FC)">First Class (FC)</option>
                <option value="AC 3 Tier (3A)">AC 3 Tier (3A)</option>
                <option value="AC 3 Economy (3E)">AC 3 Economy (3E)</option>
                <option value="Vistadome Chair Car (VC)">Vistadome Chair Car (VC)</option>
                <option value="AC Chair car (CC)">AC Chair car (CC)</option>
                <option value="Sleeper (SL)">Sleeper (SL)</option>
                <option value="Vistadome Non AC (VS)">Vistadome Non AC (VS)</option>
                <option value="Second Sitting (2S)">Second Sitting (2S)</option>
            </select>

            <label for="compartment">Compartment:</label>
            <select id="compartment" name="compartment" required>
                <option value="General">General</option>
                <option value="Ladies">Ladies</option>
                <option value="Lower Berth/Sr. Citizen">Lower Berth/Sr. Citizen</option>
                <option value="Person with Disability">Person with Disability</option>
                <option value="Duty Pass">Duty Pass</option>
                <option value="Tatkal">Tatkal</option>
                <option value="Premium Tatkal">Premium Tatkal</option>
            </select>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" onchange="togglePaymentFields(this)" required>
                <option value="">Select Payment Method</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="PayPal">PayPal</option>
                <!-- Add more payment options as needed -->
            </select>

            <!-- Payment related fields -->
            <div id="card_details">
                <h2>Payment Details</h2>
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number">
                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv">
            </div>

            <!-- Ticket Price -->
            <div id="ticket_price">
                <h2>Ticket Price</h2>
                <p id="price_display">Please enter number of seats to calculate price.</p>
            </div>

            <input type="submit" value="Book Train Ticket">
        </form>
    </div>

    <script>
        // Function to toggle payment fields based on selected payment method
        function togglePaymentFields(selectElement) {
            var cardDetails = document.getElementById('card_details');

            if (selectElement.value === 'Credit Card' || selectElement.value === 'Debit Card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        }

        // Function to calculate ticket price based on number of seats entered
        document.getElementById('seats').addEventListener('input', function() {
            var seats = parseInt(this.value);
            var priceDisplay = document.getElementById('price_display');
            var ticketPrice = 50; // Change this to your actual ticket price

            if (!isNaN(seats) && seats > 0) {
                var totalPrice = seats * ticketPrice;
                priceDisplay.textContent = 'Total Price: $' + totalPrice.toFixed(2);
            } else {
                priceDisplay.textContent = 'Please enter number of seats to calculate price.';
            }
        });
    </script>
</body>
</html>


