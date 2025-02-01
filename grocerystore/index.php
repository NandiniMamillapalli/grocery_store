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

// Include the header
require_once __DIR__ . '/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Fresh Groceries Delivered to Your Door</h1>
        <p>Shop from our wide selection of fresh fruits, vegetables, and daily essentials.</p>
        <div class="hero-buttons">
            <a href="<?php echo $base_url; ?>/products" class="btn-primary">Shop Now</a>
            <a href="<?php echo $base_url; ?>/about" class="btn-secondary">Learn More</a>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="featured-categories">
    <div class="section-header">
        <h2>Shop by Category</h2>
        <p>Explore our wide range of fresh and quality products</p>
    </div>
    <div class="category-grid">
        <a href="<?php echo $base_url; ?>/fruits" class="category-card">
            <img src="<?php echo $base_url; ?>/public/images/categories/fruits.jpg" alt="Fresh Fruits">
            <div class="category-content">
                <h3>Fresh Fruits</h3>
                <p>Handpicked fresh fruits from local farms</p>
            </div>
        </a>
        <a href="<?php echo $base_url; ?>/vegetables" class="category-card">
            <img src="<?php echo $base_url; ?>/public/images/categories/vegetables.jpg" alt="Fresh Vegetables">
            <div class="category-content">
                <h3>Fresh Vegetables</h3>
                <p>Farm-fresh vegetables delivered daily</p>
            </div>
        </a>
        <a href="<?php echo $base_url; ?>/dairy" class="category-card">
            <img src="<?php echo $base_url; ?>/public/images/categories/dairy.jpg" alt="Dairy Products">
            <div class="category-content">
                <h3>Dairy Products</h3>
                <p>Fresh milk, cheese, and dairy products</p>
            </div>
        </a>
        <a href="<?php echo $base_url; ?>/beverages" class="category-card">
            <img src="<?php echo $base_url; ?>/public/images/categories/beverages.jpg" alt="Beverages">
            <div class="category-content">
                <h3>Beverages</h3>
                <p>Refreshing drinks and beverages</p>
            </div>
        </a>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="section-header">
        <h2>Featured Products</h2>
        <p>Discover our most popular items</p>
    </div>
    <div class="product-grid">
        <?php
        // Featured products data
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Organic Bananas',
                'description' => 'Fresh organic bananas from local farms',
                'price' => 2.99,
                'image' => 'bananas.jpg',
                'category' => 'Fruits',
                'rating' => 4.5
            ],
            [
                'id' => 2,
                'name' => 'Fresh Milk',
                'description' => 'Farm-fresh whole milk',
                'price' => 3.49,
                'image' => 'milk.jpg',
                'category' => 'Dairy',
                'rating' => 4.8
            ],
            [
                'id' => 3,
                'name' => 'Red Apples',
                'description' => 'Crisp and sweet red apples',
                'price' => 4.99,
                'image' => 'apples.jpg',
                'category' => 'Fruits',
                'rating' => 4.3
            ],
            [
                'id' => 4,
                'name' => 'Whole Wheat Bread',
                'description' => 'Freshly baked whole wheat bread',
                'price' => 2.49,
                'image' => 'bread.jpg',
                'category' => 'Bakery',
                'rating' => 4.6
            ]
        ];

        foreach ($featuredProducts as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?php echo $base_url; ?>/public/images/products/<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-overlay">
                        <button class="quick-view" onclick="quickView(<?php echo $product['id']; ?>)">
                            Quick View
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category"><?php echo htmlspecialchars($product['category']); ?></div>
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <div class="product-rating">
                        <?php
                        $rating = $product['rating'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<i class="fas fa-star"></i>';
                            } elseif ($i - 0.5 <= $rating) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }
                        ?>
                        <span>(<?php echo number_format($rating, 1); ?>)</span>
                    </div>
                    <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div class="product-footer">
                        <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                        <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>)">
                            <i class="fas fa-shopping-cart"></i>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

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
