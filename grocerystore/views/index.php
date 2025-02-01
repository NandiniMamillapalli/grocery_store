<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';
?>

<!-- Main Content -->
<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Fresh Groceries Delivered to Your Door</h1>
            <p>Shop from our wide selection of fresh fruits, vegetables, and daily essentials.</p>
            <a href="/products" class="cta-button">Shop Now</a>
        </div>
    </section>

    <section class="featured-categories">
        <h2>Shop by Category</h2>
        <div class="category-grid">
            <a href="/fruits" class="category-card">
                <img src="/public/images/fruits.jpg" alt="Fruits">
                <h3>Fresh Fruits</h3>
            </a>
            <a href="/vegetables" class="category-card">
                <img src="/public/images/vegetables.jpg" alt="Vegetables">
                <h3>Fresh Vegetables</h3>
            </a>
            <a href="/dairy" class="category-card">
                <img src="/public/images/dairy.jpg" alt="Dairy">
                <h3>Dairy Products</h3>
            </a>
            <a href="/beverages" class="category-card">
                <img src="/public/images/beverages.jpg" alt="Beverages">
                <h3>Beverages</h3>
            </a>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <?php
            // This would typically come from a database
            $featuredProducts = [
                ['id' => 1, 'name' => 'Organic Bananas', 'price' => 2.99, 'image' => 'bananas.jpg'],
                ['id' => 2, 'name' => 'Fresh Milk', 'price' => 3.49, 'image' => 'milk.jpg'],
                ['id' => 3, 'name' => 'Red Apples', 'price' => 4.99, 'image' => 'apples.jpg'],
                ['id' => 4, 'name' => 'Whole Wheat Bread', 'price' => 2.49, 'image' => 'bread.jpg']
            ];

            foreach ($featuredProducts as $product): ?>
                <div class="product-card">
                    <img src="/public/images/products/<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                    <button onclick="addToCart(<?php echo $product['id']; ?>)" class="add-to-cart">
                        Add to Cart
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
