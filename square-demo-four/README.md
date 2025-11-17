# LoginCreditsApp - Square Payment Integration

Complete project with Square Sandbox payment integration for purchasing login credits.

## Setup Instructions

### 1. XAMPP Setup
- Make sure XAMPP is installed and Apache is running
- Project is located in: `c:\xampp\htdocs\square-demo-four`

### 2. Access the Application
- Open your browser and go to: `http://localhost/square-demo-four/`
- You can login with any username and password (demo purpose)

### 3. Square Sandbox Credentials (Already Configured)
```
Application ID: sandbox-sq0idb-RoBtfk6edD6F5wzJTWZPtA
Access Token: EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE
Location ID: LYHCWV6ZGN0P7
```

### 4. Testing Payments

#### Square Sandbox Test Cards:
For **SUCCESSFUL** payments, use:
- Card Number: `4111 1111 1111 1111` (Visa)
- Card Number: `5555 5555 5555 4444` (Mastercard)
- Expiration: Any future date (e.g., `12/25`)
- CVV: Any 3 digits (e.g., `123`)

For **DECLINED** payments, use:
- Card Number: `4000 0000 0000 0002`

For **CVV MISMATCH**, use:
- CVV: `200` (with any valid card)

## Features

1. **Login System** - Simple session-based authentication
2. **Buy Credits Form** - Enter desired login credits with validation
3. **Preview Page** - Shows all payment form fields (matching your original design)
4. **Square Payment Processing** - Real sandbox payment through Square API
5. **Thank You Page** - Success confirmation with transaction details
6. **Dashboard** - View statistics and transaction history
7. **Invoice Details** - Detailed invoice view with print option
8. **Session Storage** - All data stored in sessions (no database required)

## File Structure

```
square-demo-four/
├── index.php                 # Login page
├── buy_login_credits.php     # Purchase form (2 steps: form + preview)
├── process-payment.php       # Square payment processing
├── thank_you.php             # Success page
├── dashboard.php             # User dashboard with invoices
├── invoice_details.php       # Detailed invoice view
├── style.css                 # Complete styling
├── config.php                # Configuration (optional - not used in session version)
├── database.sql              # SQL file (optional - for database version)
├── images/
│   └── c-cards.gif          # Credit card logos (you need to add this)
└── README.md                # This file
```

## How to Use

1. **Login**: Go to `http://localhost/square-demo-four/` and enter any username/password

2. **Buy Credits**: 
   - Enter number of credits (minimum 100)
   - Select payment type
   - Click Preview

3. **Payment Form**:
   - Fill in all required fields
   - Use Square test card numbers above
   - Submit payment

4. **Success**: 
   - View transaction confirmation
   - Credits added to your account
   - Invoice created

5. **Dashboard**:
   - View all transactions
   - See current credit balance
   - Click "View Details" for invoice

## Important Notes

- This uses Square **SANDBOX** environment for testing
- Payments are NOT real - testing mode only
- Data is stored in **PHP sessions** (lost when session expires)
- For production, switch to live Square credentials and use a database
- The special test nonce `cnon:card-nonce-ok` is used for sandbox testing

## Next Steps (For Production)

1. Switch to live Square credentials
2. Implement database storage
3. Add user registration with password hashing
4. Add email notifications
5. Implement proper session management
6. Add security measures (CSRF tokens, input sanitization)
7. Add Square Web Payments SDK for better card input handling

## Credit Card Logos Image

You need to add a credit card logos image at `images/c-cards.gif` (198x28 pixels).
You can create one or download from the internet showing Visa, Mastercard, etc. logos.

## Support

For Square API documentation: https://developer.squareup.com/
For testing cards: https://developer.squareup.com/docs/testing/test-values

---

**Created**: November 2025
**Environment**: XAMPP + PHP + Square Sandbox
