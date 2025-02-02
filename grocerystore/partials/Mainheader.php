<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include utilities
require_once __DIR__ . '/../includes/utilities.php';

// Define base URL
$base_url = '/grocerystore';

// If we're on HTTPS, redirect to HTTP for local development
if (isSecure()) {
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $redirect);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - Fresh Mart' : 'Fresh Mart - Online Grocery Store'; ?></title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/styles.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/public/images/favicon.png">
</head>

<header>
        <div class="promo-banner" id="promoBanner">
            Special Offer: Free delivery on orders above $50! Use code: FRESH50 
            <button class="close-banner" onclick="closeBanner()">&times;</button>
        </div>
        <!-- style of navbar -->
        <nav class="navbar">
            <div class="left-section">
                <!-- <button id="menu-button" aria-label="Toggle Sidebar" class="menu-button">&#9776;</button>
                <button id="menuToggle" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button> -->
                <a href="<?php echo $base_url; ?>/views/profile.php" class="profile-btn">
                    <div class="profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="profile-text">My Profile</span>
                </a>
                <div class="logo">Fresh Mart</div>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search products...">
                <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
            </div>
            <div class="nav-links">
                <button class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="wishlist-btn" onclick="toggleWishlist()">
                    <i class="fas fa-heart"></i>
                    <span id="wishlistCount">0</span>
                </button>
                <button class="cart-btn" onclick="toggleCart()">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cartCount">0</span>
                </button>
                <button class="login-btn" onclick="toggleLoginForm()">Login</button>
                <div class="location-picker" onclick="toggleLocationPicker()">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="currentLocation">Select Location</span>
                </div>
            </div>
        </nav>
        <nav class="category-nav">
            <button class="category-btn active" onclick="filterByCategory('all')">All</button>
            <button class="category-btn" onclick="filterByCategory('fruits')">Fruits</button>
            <button class="category-btn" onclick="filterByCategory('vegetables')">Vegetables</button>
            <button class="category-btn" onclick="filterByCategory('dairy')">Dairy</button>
            <button class="category-btn" onclick="filterByCategory('beverages')">Beverages</button>
        </nav>

    <script src="./public/js/script.js"></script>

    </header>
    <!-- Login Modal -->
    <?php if (!isset($_SESSION['user_id'])): ?>
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Login to Fresh Mart</h2>
                <span class="close" onclick="toggleLoginForm()">&times;</span>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="auth-form" onsubmit="return handleLogin(event)">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Login</button>
                        <a href="#" onclick="toggleForms()" class="switch-form">New user? Register here</a>
                    </div>
                </form>
                
                <form id="registerForm" class="auth-form" style="display: none;" onsubmit="return handleRegister(event)">
                    <div class="form-group">
                        <label for="reg-name">Full Name</label>
                        <input type="text" id="reg-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-email">Email</label>
                        <input type="email" id="reg-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" id="reg-password" name="password" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Register</button>
                        <a href="#" onclick="toggleForms()" class="switch-form">Already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>