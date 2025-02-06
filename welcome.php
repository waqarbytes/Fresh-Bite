<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: login.html');
    exit();
}

$userName = htmlspecialchars($_SESSION['user_name']);
$userType = htmlspecialchars($_SESSION['login_type']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Hostel Bite</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 90%;
            width: 500px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .welcome-icon {
            width: 80px;
            height: 80px;
            background: #764ba2;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        h1 {
            color: #2d3748;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .user-type {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.9rem;
            margin: 1rem 0;
        }

        p {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .action-btn {
            display: inline-block;
            background: #764ba2;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #667eea;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h1>WELCOME TO FRESH BITE!</h1>
        <span class="user-type"><?php echo ucfirst($userType); ?></span>
        <p>Hello <?php echo $userName; ?>! We're excited to have you here.</p>
        <a href="dashboard.php" class="action-btn">Go to Dashboard</a>
    </div>
</body>
</html>