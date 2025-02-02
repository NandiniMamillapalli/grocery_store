<?php
// Include the header
require_once __DIR__ . '/../partials/Mainheader.php';
?>

<!-- Main Content -->
<main>
    <!-- <section class="hero">
        <div class="hero-content">
            <h1>Fresh Groceries Delivered to Your Door</h1>
            <p>Shop from our wide selection of fresh fruits, vegetables, and daily essentials.</p>
            <a href="/products" class="cta-button">Shop Now</a>
        </div>
    </section> -->

    

    <div id="sidebarOverlay" class="sidebar-overlay"></div>


        <div class="sort-options">
            <h3>Sort By:</h3>
            <select id="sortSelect">
                <option value="default">Select</option>
                <option value="priceAsc">Price: Low to High</option>
                <option value="priceDesc">Price: High to Low</option>
                <option value="ratingAsc">Rating: Low to High</option>
                <option value="ratingDesc">Rating: High to Low</option>
            </select>
        </div>

        <div id="productsContainer" class="product-grid">
            <!-- Products will be dynamically loaded here -->
        </div>

        <script src="./public/js/script.js"></script>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
