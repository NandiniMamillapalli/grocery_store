<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// Category data should be passed to this template
$categoryData = $categoryData ?? [
    'title' => 'Category Name',
    'description' => 'Category Description',
    'image' => 'category.jpg',
    'products' => []
];
?>

<main class="category-page">
    <section class="category-hero" style="background-image: url('/public/images/categories/<?php echo htmlspecialchars($categoryData['image']); ?>')">
        <div class="container">
            <h1><?php echo htmlspecialchars($categoryData['title']); ?></h1>
            <p><?php echo htmlspecialchars($categoryData['description']); ?></p>
        </div>
    </section>

    <section class="category-content">
        <div class="container">
            <div class="filters-and-sort">
                <div class="filters">
                    <button class="filter-btn" onclick="toggleFilters()">
                        <i class="fas fa-filter"></i> Filters
                    </button>
                    <div class="filter-options" id="filterOptions">
                        <div class="filter-group">
                            <h3>Price Range</h3>
                            <div class="price-range">
                                <input type="range" min="0" max="100" value="50" class="price-slider">
                                <div class="price-inputs">
                                    <input type="number" placeholder="Min" class="min-price">
                                    <input type="number" placeholder="Max" class="max-price">
                                </div>
                            </div>
                        </div>
                        <div class="filter-group">
                            <h3>Brand</h3>
                            <div class="checkbox-group">
                                <label><input type="checkbox"> Brand 1</label>
                                <label><input type="checkbox"> Brand 2</label>
                                <label><input type="checkbox"> Brand 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sort">
                    <select onchange="sortProducts(this.value)">
                        <option value="popular">Most Popular</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="name">Name: A to Z</option>
                    </select>
                </div>
            </div>

            <div class="products-grid">
                <?php if (empty($categoryData['products'])): ?>
                    <div class="no-products">
                        <p>No products found in this category.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($categoryData['products'] as $product): ?>
                        <div class="product-card">
                            <img src="/public/images/products/<?php echo htmlspecialchars($product['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-info">
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                                <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                                <button onclick="addToCart(<?php echo $product['id']; ?>)" class="add-to-cart">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="pagination">
                <button class="prev-page" <?php echo $page <= 1 ? 'disabled' : ''; ?>>&lt; Previous</button>
                <div class="page-numbers">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <button class="<?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></button>
                    <?php endfor; ?>
                </div>
                <button class="next-page" <?php echo $page >= $totalPages ? 'disabled' : ''; ?>>Next &gt;</button>
            </div>
        </div>
    </section>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
