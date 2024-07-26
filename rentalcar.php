<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt_insert = $conn->prepare("INSERT INTO rentalcar (name, phone, pickup_location, pickup_date, pickup_time, dropoff_date, dropoff_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_insert->bind_param("sssssss", $name, $phone, $pickup_location, $pickup_date, $pickup_time, $dropoff_date, $dropoff_time);

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pickup_location = $_POST["pickup-location"];
    $pickup_date = $_POST["pickup-date"];
    $pickup_time = $_POST["pickup-time"];
    $dropoff_date = $_POST["dropoff-date"];
    $dropoff_time = $_POST["dropoff-time"];

    if ($stmt_insert->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt_insert->error;
    }

    $stmt_insert->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Car Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background-color: #444;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 800px;
        }
        .form-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to PlutoCars</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="tradecar.php">Trade Car?</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>
    <div class="container">
        <div class="form-container">
            <h2>Rental Car</h2>
            <form id="rental-car-form" action="rentalcar.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Your phone number" required>
                </div>
                <div class="form-group">
                    <label for="pickup-location">Pick-up Location</label>
                    <input type="text" id="pickup-location" name="pickup-location" placeholder="Pick-up location" required>
                </div>
                <div class="form-group">
                    <label for="pickup-date">Pick-up Date</label>
                    <input type="date" id="pickup-date" name="pickup-date" required>
                </div>
                <div class="form-group">
                    <label for="pickup-time">Pick-up Time</label>
                    <input type="time" id="pickup-time" name="pickup-time" required>
                </div>
                <div class="form-group">
                    <label for="dropoff-date">Drop-off Date</label>
                    <input type="date" id="dropoff-date" name="dropoff-date" required>
                </div>
                <div class="form-group">
                    <label for="dropoff-time">Drop-off Time</label>
                    <input type="time" id="dropoff-time" name="dropoff-time" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("rental-car-form").addEventListener("submit", function(event) {
            //event.preventDefault(); // Prevent form submission
            const formData = new FormData(this);
            for (const pair of formData.entries()) {
                console.log(pair[0] + ": " + pair[1]);
            }
            // this.reset();
        });
    </script>
</body>
</html>
