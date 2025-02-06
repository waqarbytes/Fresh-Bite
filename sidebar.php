<?php
// This file contains the sidebar navigation that's shared across pages
?>
<nav class="sidebar">
    <div class="logo">
        <h2>Hostel Bite</h2>
    </div>
    <div class="user-info">
        <div class="avatar">
            <?php echo strtoupper(substr($userName, 0, 1)); ?>
        </div>
        <div class="user-details">
            <h3><?php echo $userName; ?></h3>
            <span class="user-type"><?php echo ucfirst($userType); ?></span>
        </div>
    </div>
    <ul class="nav-links">
        <li class="<?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : ''; ?>">
            <a href="dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
        </li>
        <?php if ($userType === 'student'): ?>
        <li class="<?php echo basename($_SERVER['PHP_SELF']) === 'meals.php' ? 'active' : ''; ?>">
            <a href="meals.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15.5 12a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"/><path d="M12 2v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="M2 12h2"/><path d="m19.07 4.93-1.41 1.41"/><path d="M22 12h-2"/><path d="m19.07 19.07-1.41-1.41"/><path d="M12 20v2"/><path d="m4.93 19.07 1.41-1.41"/></svg>
                Meal Schedule
            </a>
        </li>
        <li class="<?php echo basename($_SERVER['PHP_SELF']) === 'complaints.php' ? 'active' : ''; ?>">
            <a href="complaints.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>
                Complaints
            </a>
        </li>
        <?php else: ?>
        <li class="<?php echo basename($_SERVER['PHP_SELF']) === 'students.php' ? 'active' : ''; ?>">
            <a href="students.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Manage Students
            </a>
        </li>
        <li class="<?php echo basename($_SERVER['PHP_SELF']) === 'meals.php' ? 'active' : ''; ?>">
            <a href="meals.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15.5 12a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"/><path d="M12 2v2"/><path d="M12 20v2"/></svg>
                Manage Meals
            </a>
        </li>
        <?php endif; ?>
        <li>
            <a href="profile.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0-6 0"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                Settings
            </a>
        </li>
        <li>
            <a href="logout.php" class="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </li>
    </ul>
</nav>