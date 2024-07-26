<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Sales Website</title>
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
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .block {
            width: 200px;
            height: 200px;
            margin: 10px;
            border: 1px solid #ddd;
            overflow: hidden;
            position: relative;
        }
        .block img {
            width: 100%;
            height: 100%;
            object-fit: fit;
            transition: transform 0.3s ease;
        }
        .block:hover img {
            transform: scale(1.1);
        }
        .block a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-indent: -9999px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
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
        <div class="block" onclick="goToCarPage('audi.html')">
            <img src="images/logo1.jpg" alt="logo 1">
        </div>
        <div class="block" onclick="goToCarPage('bmw.html')">
            <img src="images/logo2.jpg" alt="logo 2">
        </div>
        <div class="block" onclick="goToCarPage('benz.html')">
            <img src="images/logo3.png" alt="logo 3">
        </div>
        <div class="block" onclick="goToCarPage('hyundai.html')">
            <img src="images/logo4.jpg" alt="logo 4">
        </div>
        <div class="block" onclick="goToCarPage('mahindra.html')">
            <img src="images/logo5.webp" alt="logo 5">
        </div>
    </div>
    <footer>
        <a href="#">About</a>
        <a href="#">Contact Us</a>
    </footer>
    <script>
        function goToCarPage(url) {
            window.location.href = url;
        }

        function tradecar() {
            window.location.href = 'tradecar.html';
        }

    </script>
</body>
</html>
