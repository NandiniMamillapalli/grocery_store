<?php
// Basic error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Include utilities
require_once __DIR__ . '/includes/utilities.php';

// Base URL - adjust this if needed
$base_url = '/grocerystore';

require_once __DIR__ . '/views/home.php';
?>

<!-- Hero Section -->
<!-- <section class="hero">
    <div class="hero-content">
        <h1>Fresh Groceries Delivered to Your Door</h1>
        <p>Shop from our wide selection of fresh fruits, vegetables, and daily essentials.</p>
        <div class="hero-buttons">
            <a href="<?php echo $base_url; ?>/products" class="btn-primary">Shop Now</a>
            <a href="<?php echo $base_url; ?>/about" class="btn-secondary">Learn More</a>
        </div>
    </div>
</section> -->



<!-- Special Offers -->
<section class="special-offers">
    <div class="section-header">
        <h2>Special Offers</h2>
        <p>Don't miss out on these amazing deals</p>
    </div>
    <div class="offers-grid">
        <div class="offer-card">
            <img src="<?php echo $base_url; ?>/public/images/offers/offer1.jpg" alt="Special Offer 1">
            <div class="offer-content">
                <h3>20% Off Fresh Fruits</h3>
                <p>Use code: FRESH20</p>
                <a href="<?php echo $base_url; ?>/products?category=fruits" class="btn-secondary">Shop Now</a>
            </div>
        </div>
        <div class="offer-card">
            <img src="<?php echo $base_url; ?>/public/images/offers/offer2.jpg" alt="Special Offer 2">
            <div class="offer-content">
                <h3>Buy 2 Get 1 Free</h3>
                <p>On all dairy products</p>
                <a href="<?php echo $base_url; ?>/products?category=dairy" class="btn-secondary">Shop Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
    <div class="newsletter-content">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Get updates about new products and special offers</p>
        <form id="subscriptionForm" onsubmit="return handleSubscribe(event)">
            <div class="form-group">
                <input type="email" id="subscribeEmail" placeholder="Enter your email" required>
                <button type="submit" class="btn-primary">Subscribe</button>
            </div>
        </form>
    </div>
</section>

<?php
// Include the footer
require_once __DIR__ . '/partials/footer.php';
?>
