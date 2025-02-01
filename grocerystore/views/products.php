<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, these would come from a database
$categories = [
    'fruits' => 'Fresh Fruits',
    'vegetables' => 'Fresh Vegetables',
    'dairy' => 'Dairy Products',
    'beverages' => 'Beverages',
    'snacks' => 'Snacks',
    'bakery' => 'Bakery'
];

$products = [
    [
        'id' => 1,
        'name' => 'Organic Bananas',
        'category' => 'fruits',
        'price' => 2.99,
        'image' => 'bananas.jpg',
        'description' => 'Fresh organic bananas from local farmers'
    ],
    [
        'id' => 2,
        'name' => 'Fresh Milk',
        'category' => 'dairy',
        'price' => 3.49,
        'image' => 'milk.jpg',
        'description' => 'Farm fresh whole milk'
    ],
    // Add more products as needed
];
?>

<main class="products-page">
    <section class="products-hero">
        <div class="container">
            <h1>Our Products</h1>
            <p>Browse through our wide selection of fresh and quality products</p>
        </div>
    </section>

    <section class="products-content">
        <div class="container">
            <div class="products-grid">
                <aside class="filters">
                    <h2>Categories</h2>
                    <ul class="category-list">
                        <?php foreach ($categories as $slug => $name): ?>
                        <li>
                            <a href="/category/<?php echo htmlspecialchars($slug); ?>" 
                               class="category-link <?php echo isset($_GET['category']) && $_GET['category'] === $slug ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($name); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="price-filter">
                        <h2>Price Range</h2>
                        <input type="range" id="priceRange" min="0" max="100" step="1">
                        <div class="price-inputs">
                            <input type="number" id="minPrice" placeholder="Min">
                            <input type="number" id="maxPrice" placeholder="Max">
                        </div>
                    </div>
                </aside>

                <div class="products-list">
                    <div class="products-header">
                        <div class="products-count">
                            <p><?php echo count($products); ?> Products found</p>
                        </div>
                        <div class="products-sort">
                            <select id="sortProducts">
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="name">Name: A to Z</option>
                            </select>
                        </div>
                    </div>

                    <div class="products-grid">
                        <?php foreach ($products as $product): ?>
                        <div class="product-card" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                            <img src="/public/images/products/<?php echo htmlspecialchars($product['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-info">
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                                <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                                <button onclick="addToCart(<?php echo $product['id']; ?>)" class="add-to-cart">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="pagination">
                        <button class="prev-page" disabled>&lt; Previous</button>
                        <div class="page-numbers">
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                        </div>
                        <button class="next-page">Next &gt;</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
