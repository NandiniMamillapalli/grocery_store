<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Sign in to view your profile.';
    header('Location: index.php');
    exit;
}

require_once 'config/db.php';

// Get user details
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Fresh Mart</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="profile-page">
    <header>
        <nav class="navbar">
            <div class="logo">Fresh Mart</div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="products.html">Products</a>
                <a href="about.html">About</a>
                <a href="contact.html">Contact</a>
                <a href="profile.php" class="active">Profile</a>
                <button class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon"></i>
                </button>
                <a href="cart.html" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
            <button id="plogoutBtn" class="logout-btn" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </nav>
    </header>

    <main class="profile-page">
        <div class="profile-container">
            <!-- User Info Section -->
            <section class="profile-section user-info">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <img id="userAvatar" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d" alt="Profile Picture">
                        <button class="edit-avatar" onclick="editAvatar()">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div class="profile-details">
                        <h2 id="profileUser"><?= htmlspecialchars($user['username']); ?></h2>
                        <p id="profileEmail"><?= htmlspecialchars($user['email']); ?></p>
                    </div>
                </div>
            </section>

            <!-- Loyalty Status Section -->
            <section class="profile-section loyalty-status">
                <h2>Loyalty Status</h2>
                <div class="loyalty-card">
                    <div class="loyalty-tier">
                        <span class="tier-badge" id="userTier">Gold</span>
                        <span class="points" id="userPoints">5,240 points</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" id="tierProgress"></div>
                    </div>
                    <p class="next-tier" id="nextTierInfo">760 points to Platinum</p>
                </div>
                <div class="points-history">
                    <h3>Points History</h3>
                    <div id="pointsHistoryList" class="history-list">
                        <!-- Points history will be populated here -->
                    </div>
                </div>
            </section>

            <!-- Order History Section -->
            <section class="profile-section order-history">
                <h2>Order History</h2>
                <div class="orders-list" id="ordersList">
                    <!-- Order history will be populated here -->
                </div>
            </section>

            <!-- Preferences Section -->
            <section class="profile-section preferences">
                <h2>Preferences</h2>
                <div class="preference-options">
                    <div class="preference-group">
                        <h3>Dietary Preferences</h3>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="dietary" value="vegetarian"> Vegetarian</label>
                            <label><input type="checkbox" name="dietary" value="vegan"> Vegan</label>
                            <label><input type="checkbox" name="dietary" value="gluten-free"> Gluten-Free</label>
                            <label><input type="checkbox" name="dietary" value="dairy-free"> Dairy-Free</label>
                        </div>
                    </div>
                    <div class="preference-group">
                        <h3>Notification Settings</h3>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="notifications" value="orders"> Order Updates</label>
                            <label><input type="checkbox" name="notifications" value="deals"> Special Deals</label>
                            <label><input type="checkbox" name="notifications" value="points"> Points Updates</label>
                            <label><input type="checkbox" name="notifications" value="newsletter"> Newsletter</label>
                        </div>
                    </div>
                </div>
                <button class="save-preferences-btn" onclick="savePreferences()">Save Preferences</button>
            </section>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: support@freshmart.com</p>
                <p>Phone: (555) 123-4567</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Newsletter</h3>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Fresh Mart. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script  src="auth.js"></script>
</body>
</html>
