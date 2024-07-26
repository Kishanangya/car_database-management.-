<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO usedcar (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
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
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .car-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .car-image {
            width: 300px; 
            height: 200px;
            margin-right: 20px;
        }
        .car-details {
            text-align: center;
            margin-bottom: 20px;
        }
        .car-name {
            font-size: 24px;
            font-weight: bold;
            padding: 20px;
        }
        .car-price {
            font-size: 36px;
            font-weight: bold;
            color: black;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            width: 500px;
            margin-top: 300px; 
            margin-bottom: 20px; 
            margin-right: 300px;
        }
        .car-button {
            background-color: #ff000067;
            border: none;
            color: white;
            padding: 10px 20px; 
            text-align: center;
            text-decoration: none;
            font-size: 14px; 
            cursor: pointer;
            border-radius: 5px;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
            
        }
        .form-block {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-block .message-block {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-block .message-block h2 {
            margin: 0;
        }
        .form-block input[type="text"],
        .form-block input[type="email"],
        .form-block input[type="tel"],
        .form-block textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .form-block textarea {
            height: 100px;
        }
        .form-block button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-block button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Used Car Form</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="tradecar.php">Trade Car?</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>
    
    <div class="container">
        <div class="form-block">
            <div class="message-block">
                <h2>Used Car</h2>
            </div>
            <form id="newCarForm" action="usedcar.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="tel" name="phone" placeholder="Your Phone Number" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('newCarForm').addEventListener('submit', function(event) {
            //event.preventDefault();
            const formData = new FormData(this);
            console.log('Form data:', formData);
            //this.reset();
        });
    </script>
</body>
</html>