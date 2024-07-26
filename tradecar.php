<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $stmt = $conn->prepare("INSERT INTO tradecar (message, make, model, registration, kilometers, name, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $message, $make, $model, $registration, $kilometers, $name, $email, $phone);

    $message = $_POST["message"];
    $make = $_POST["make"];
    $model = $_POST["model"];
    $registration = $_POST["registration"];
    $kilometers = $_POST["kilometers"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();


$conn->close();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Car</title>
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
            height: 900px;
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
        input[type="email"],
        input[type="date"],
        textarea {
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
            <h2>Trade Car</h2>
            <form id="trade-car-form" action="tradecar.php" method="POST">
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Write your message here"></textarea>
                </div>
                <div class="form-group">
                    <label for="make">Make</label>
                    <input type="text" id="make" name="make" placeholder="Car make" required>
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" id="model" name="model" placeholder="Car model" required>
                </div>
                <div class="form-group">
                    <label for="registration">First Registration</label>
                    <input type="date" id="registration" name="registration" required>
                </div>
                <div class="form-group">
                    <label for="kilometers">Kilometers Driven</label>
                    <input type="text" id="kilometers" name="kilometers" placeholder="Kilometers driven" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Your phone number" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("trade-car-form").addEventListener("submit", function(event) {
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
