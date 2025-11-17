<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
            padding-top: 100px;
        }
        .box {
            width: 400px;
            background: white;
            padding: 40px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .box h1 {
            color: green;
        }
        .home-btn {
            padding: 12px 22px;
            background: #1B476E;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        .home-btn:hover {
            background: #153958;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Thank You!</h1>
    <p>Your payment was successful.</p>
    <p>We have added your login credits.</p>

    <button class="home-btn" onclick="window.location.href='index.php'">Go to Home</button>
</div>

</body>
</html>
