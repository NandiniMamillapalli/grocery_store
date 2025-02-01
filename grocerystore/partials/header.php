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
<body>
    <header>
        <!-- Promo Banner -->
        <div class="promo-banner" id="promoBanner">
            Special Offer: Free delivery on orders above $50! Use code: FRESH50 
            <button class="close-banner" onclick="closeBanner()">&times;</button>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo">
                    <a href="<?php echo $base_url; ?>/">
                        <img src="<?php echo $base_url; ?>/public/images/logo.png" alt="Fresh Mart">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="search-bar">
                    <form action="<?php echo $base_url; ?>/search" method="GET">
                        <input type="text" name="q" placeholder="Search for products...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links">
                    <a href="<?php echo $base_url; ?>/products" class="nav-link">Products</a>
                    <a href="<?php echo $base_url; ?>/categories" class="nav-link">Categories</a>
                    <a href="<?php echo $base_url; ?>/deals" class="nav-link">Deals</a>
                    <a href="<?php echo $base_url; ?>/about" class="nav-link">About</a>
                    <a href="<?php echo $base_url; ?>/contact" class="nav-link">Contact</a>
                </div>

                <!-- User Actions -->
                <div class="nav-actions">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="<?php echo $base_url; ?>/profile" class="nav-link">
                            <i class="fas fa-user"></i>
                            Profile
                        </a>
                        <a href="<?php echo $base_url; ?>/logout" class="nav-link">Logout</a>
                    <?php else: ?>
                        <button onclick="toggleLoginForm()" class="login-btn">
                            <i class="fas fa-user"></i>
                            Login
                        </button>
                    <?php endif; ?>
                    
                    <a href="<?php echo $base_url; ?>/cart" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count"><?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '0'; ?></span>
                    </a>
                </div>
            </div>
        </nav>
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
