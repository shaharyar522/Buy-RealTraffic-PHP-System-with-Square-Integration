<?php
session_start();

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simple validation (in real app, check against database)
    if (!empty($username) && !empty($password)) {
        // Create user session
        $_SESSION['user'] = [
            'id' => 1,
            'username' => $username,
            'email' => 'demo@example.com',
            'firstname' => 'Demo',
            'lastname' => 'User',
            'login_credits' => 0
        ];
        
        // Initialize invoices array if not exists
        if (!isset($_SESSION['invoices'])) {
            $_SESSION['invoices'] = [];
        }
        
        header('Location: buy_login_credits.php');
        exit;
    } else {
        $error = "Please enter username and password";
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LoginCreditsApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>LoginCreditsApp</h2>
        <h3 style="text-align: center; color: #667eea;">Sign In</h3>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="TextBoxSmall" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="TextBoxSmall" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="login" class="formbutton" style="width: 100%;">Login</button>
            </div>
            
            <p style="text-align: center; color: #666; margin-top: 20px;">
                Demo: Use any username and password to login
            </p>
        </form>
    </div>
</body>
</html>
