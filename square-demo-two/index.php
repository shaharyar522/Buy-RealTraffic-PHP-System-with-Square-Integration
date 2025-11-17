<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Credit System</title>
    <link rel="stylesheet" href="assets/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f6fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 450px;
            margin: 100px auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 4px 14px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #1B476E;
        }

        .btn {
            background: #1B476E;
            padding: 14px 25px;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            border-radius: 6px;
            font-size: 18px;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #163a57;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Welcome to Login Credit System</h2>

        <p style="font-size:16px;color:#444;">
            Click below to purchase login credits.
        </p>

        <a href="buy_login_credits.php" class="btn">Buy Login Credits</a>
    </div>

</body>
</html>
