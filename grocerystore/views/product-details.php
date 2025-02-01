<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, this would come from a database based on the product ID
$product = [
    'id' => 1,
    'name' => 'Organic Bananas',
    'price' => 2.99,
    'description' => 'Fresh organic bananas, perfect for smoothies and snacks.',
    'category' => 'Fruits',
    'images' => [
        'bananas-1.jpg',
        'bananas-2.jpg',
        'bananas-3.jpg'
    ],
    'details' => [
        'Origin' => 'Ecuador',
        'Type' => 'Organic',
        'Weight' => '1 bunch (approx. 1kg)',
        'Storage' => 'Store at room temperature'
    ],
    'nutritional_info' => [
        'Calories' => '89 kcal',
        'Protein' => '1.1g',
        'Carbohydrates' => '22.8g',
        'Fat' => '0.3g',
        'Fiber' => '2.6g'
    ],
    'related_products' => [
        [
            'id' => 2,
            'name' => 'Red Apples',
            'price' => 3.49,
            'image' => 'apples.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Fresh Oranges',
            'price' => 4.99,
            'image' => 'oranges.jpg'
        ]
    ]
];
?>

<main class="product-details">
    <div class="container">
        <nav class="breadcrumb">
            <a href="/">Home</a> &gt;
            <a href="/products">Products</a> &gt;
            <a href="/<?php echo strtolower($product['category']); ?>"><?php echo $product['category']; ?></a> &gt;
            <span><?php echo htmlspecialchars($product['name']); ?></span>
        </nav>

        <div class="product-content">
            <div class="product-gallery">
                <div class="main-image">
                    <img src="/public/images/products/<?php echo $product['images'][0]; ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" id="mainImage">
                </div>
                <div class="thumbnail-list">
                    <?php foreach ($product['images'] as $index => $image): ?>
                    <img src="/public/images/products/<?php echo $image; ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?> view <?php echo $index + 1; ?>"
                         onclick="changeMainImage(this.src)"
                         class="<?php echo $index === 0 ? 'active' : ''; ?>">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="product-info">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <div class="price">$<?php echo number_format($product['price'], 2); ?></div>
                <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>

                <div class="purchase-options">
                    <div class="quantity">
                        <label for="quantity">Quantity:</label>
                        <div class="quantity-controls">
                            <button onclick="updateQuantity('decrease')">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="99">
                            <button onclick="updateQuantity('increase')">+</button>
                        </div>
                    </div>
                    <button onclick="addToCart(<?php echo $product['id']; ?>)" class="add-to-cart">
                        Add to Cart
                    </button>
                </div>

                <div class="product-details-tabs">
                    <div class="tabs">
                        <button class="tab active" onclick="showTab('details')">Details</button>
                        <button class="tab" onclick="showTab('nutrition')">Nutrition</button>
                    </div>

                    <div id="detailsContent" class="tab-content active">
                        <table class="details-table">
                            <?php foreach ($product['details'] as $key => $value): ?>
                            <tr>
                                <th><?php echo htmlspecialchars($key); ?></th>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                    <div id="nutritionContent" class="tab-content">
                        <table class="nutrition-table">
                            <?php foreach ($product['nutritional_info'] as $key => $value): ?>
                            <tr>
                                <th><?php echo htmlspecialchars($key); ?></th>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <section class="related-products">
            <h2>Related Products</h2>
            <div class="products-grid">
                <?php foreach ($product['related_products'] as $relatedProduct): ?>
                <div class="product-card">
                    <img src="/public/images/products/<?php echo htmlspecialchars($relatedProduct['image']); ?>" 
                         alt="<?php echo htmlspecialchars($relatedProduct['name']); ?>">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($relatedProduct['name']); ?></h3>
                        <p class="price">$<?php echo number_format($relatedProduct['price'], 2); ?></p>
                        <button onclick="addToCart(<?php echo $relatedProduct['id']; ?>)" class="add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
