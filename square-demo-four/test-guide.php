<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square Payment Test - LoginCreditsApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .test-container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }
        .test-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .code-block {
            background: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="test-container">
            <h1 style="color: #1B476E; text-align: center; margin-bottom: 30px;">
                🧪 Square Sandbox Testing Guide
            </h1>
            
            <div class="test-section">
                <h3 style="color: #667eea; margin-bottom: 15px;">✅ Square Configuration</h3>
                <div class="code-block">
Application ID: sandbox-sq0idb-RoBtfk6edD6F5wzJTWZPtA<br>
Access Token: EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE<br>
Location ID: LYHCWV6ZGN0P7<br>
Environment: SANDBOX (Testing Mode)
                </div>
            </div>
            
            <div class="test-section">
                <h3 style="color: #28a745; margin-bottom: 15px;">💳 Test Card Numbers</h3>
                <table style="width: 100%; margin-top: 15px;">
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">
                            <strong>Successful Payment (Visa):</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6; font-family: monospace;">
                            4111 1111 1111 1111
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">
                            <strong>Successful Payment (Mastercard):</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6; font-family: monospace;">
                            5555 5555 5555 4444
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">
                            <strong>Declined Payment:</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6; font-family: monospace;">
                            4000 0000 0000 0002
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">
                            <strong>Expiration Date:</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #dee2e6;">
                            Any future date (e.g., 12/25)
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;">
                            <strong>CVV:</strong>
                        </td>
                        <td style="padding: 10px;">
                            Any 3 digits (e.g., 123)
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="test-section">
                <h3 style="color: #764ba2; margin-bottom: 15px;">🔄 Testing Workflow</h3>
                <ol style="line-height: 2;">
                    <li>Go to <a href="index.php" style="color: #667eea; font-weight: bold;">Login Page</a></li>
                    <li>Login with any username and password</li>
                    <li>Enter number of credits (minimum: 100)</li>
                    <li>Click "Preview" to see payment form</li>
                    <li>Fill in payment details using test card above</li>
                    <li>Submit and see success/failure message</li>
                    <li>View invoice in <a href="dashboard.php" style="color: #667eea; font-weight: bold;">Dashboard</a></li>
                </ol>
            </div>
            
            <div class="test-section">
                <h3 style="color: #dc3545; margin-bottom: 15px;">⚠️ Important Notes</h3>
                <ul style="line-height: 2;">
                    <li>This is <strong>SANDBOX mode</strong> - No real money is processed</li>
                    <li>Data is stored in <strong>PHP sessions</strong> (will be lost on logout)</li>
                    <li>All test transactions appear in your Square Sandbox dashboard</li>
                    <li>For production, switch to live Square credentials</li>
                </ul>
            </div>
            
            <div style="text-align: center; margin-top: 40px;">
                <a href="index.php" class="formbutton" style="margin: 0 10px;">
                    Start Testing
                </a>
                <a href="https://developer.squareup.com/docs/testing/test-values" 
                   target="_blank" 
                   class="formbutton" 
                   style="background: #6c757d; margin: 0 10px;">
                    Square Testing Docs
                </a>
            </div>
        </div>
    </div>
</body>
</html>
