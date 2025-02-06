<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: login.html');
    exit();
}

$userName = htmlspecialchars($_SESSION['user_name']);
$userType = htmlspecialchars($_SESSION['login_type']);


$weeklyMenu = [
    'Monday' => ['breakfast' => 'Idli Sambar', 'lunch' => 'Rice and Dal', 'dinner' => 'Chapati and Curry'],
    'Tuesday' => ['breakfast' => 'Poha', 'lunch' => 'Rice and Rajma', 'dinner' => 'Paratha and Dal'],
    'Wednesday' => ['breakfast' => 'Upma', 'lunch' => 'Rice and Sambar', 'dinner' => 'Chapati and Paneer'],
    'Thursday' => ['breakfast' => 'Dosa', 'lunch' => 'Rice and Kadhi', 'dinner' => 'Pulao and Raita'],
    'Friday' => ['breakfast' => 'Puri Bhaji', 'lunch' => 'Rice and Fish Curry', 'dinner' => 'Chapati and Chicken'],
    'Saturday' => ['breakfast' => 'Sandwich', 'lunch' => 'Biryani', 'dinner' => 'Chapati and Mixed Veg'],
    'Sunday' => ['breakfast' => 'Chole Bhature', 'lunch' => 'Special Thali', 'dinner' => 'Chapati and Paneer']
];

$currentDay = date('l'); // Gets the current day name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Management - Hostel Bite</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="meals.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Include the sidebar -->
        <?php include 'sidebar.php'; ?>
        
        <main class="content">
            <header>
                <h1>Meal Management</h1>
                <?php if ($userType === 'warden'): ?>
                <button class="primary-btn" onclick="openEditMenu()">Edit Menu</button>
                <?php endif; ?>
            </header>

            <div class="meal-content">
                <div class="today-menu">
                    <h2>Today's Menu</h2>
                    <div class="menu-card">
                        <div class="meal-time">
                            <h3>Breakfast</h3>
                            <p><?php echo $weeklyMenu[$currentDay]['breakfast']; ?></p>
                            <?php if ($userType === 'student'): ?>
                            <button class="attendance-btn" data-meal="breakfast">Mark Attendance</button>
                            <?php endif; ?>
                        </div>
                        <div class="meal-time">
                            <h3>Lunch</h3>
                            <p><?php echo $weeklyMenu[$currentDay]['lunch']; ?></p>
                            <?php if ($userType === 'student'): ?>
                            <button class="attendance-btn" data-meal="lunch">Mark Attendance</button>
                            <?php endif; ?>
                        </div>
                        <div class="meal-time">
                            <h3>Dinner</h3>
                            <p><?php echo $weeklyMenu[$currentDay]['dinner']; ?></p>
                            <?php if ($userType === 'student'): ?>
                            <button class="attendance-btn" data-meal="dinner">Mark Attendance</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="weekly-menu">
                    <h2>Weekly Menu</h2>
                    <div class="menu-grid">
                        <?php foreach ($weeklyMenu as $day => $meals): ?>
                        <div class="day-card <?php echo $day === $currentDay ? 'current-day' : ''; ?>">
                            <h3><?php echo $day; ?></h3>
                            <div class="meals">
                                <p><strong>Breakfast:</strong> <?php echo $meals['breakfast']; ?></p>
                                <p><strong>Lunch:</strong> <?php echo $meals['lunch']; ?></p>
                                <p><strong>Dinner:</strong> <?php echo $meals['dinner']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if ($userType === 'warden'): ?>
                <div class="attendance-summary">
                    <h2>Today's Attendance Summary</h2>
                    <div class="summary-cards">
                        <div class="summary-card">
                            <h3>Breakfast</h3>
                            <p class="count">45/50</p>
                            <p class="percentage">90% Attendance</p>
                        </div>
                        <div class="summary-card">
                            <h3>Lunch</h3>
                            <p class="count">48/50</p>
                            <p class="percentage">96% Attendance</p>
                        </div>
                        <div class="summary-card">
                            <h3>Dinner</h3>
                            <p class="count">47/50</p>
                            <p class="percentage">94% Attendance</p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?php if ($userType === 'warden'): ?>
    <!-- Edit Menu Modal -->
    <div id="editMenuModal" class="modal">
        <div class="modal-content">
            <h2>Edit Weekly Menu</h2>
            <form id="editMenuForm">
                <!-- Form content will be dynamically populated by JavaScript -->
            </form>
        </div>
    </div>
    <?php endif; ?>

    <script src="meals.js"></script>
</body>
</html>