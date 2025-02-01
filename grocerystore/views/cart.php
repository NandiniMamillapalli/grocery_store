<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, cart items would come from the session or database
$cartItems = [
    [
        'id' => 1,
        'name' => 'Organic Bananas',
        'price' => 2.99,
        'quantity' => 2,
        'image' => 'bananas.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Fresh Milk',
        'price' => 3.49,
        'quantity' => 1,
        'image' => 'milk.jpg'
    ]
];

// Calculate totals
$subtotal = array_reduce($cartItems, function($carry, $item) {
    return $carry + ($item['price'] * $item['quantity']);
}, 0);

$shipping = 5.99;
$total = $subtotal + $shipping;
?>

<main class="cart-page">
    <div class="container">
        <h1>Shopping Cart</h1>
        
        <div class="cart-content">
            <div class="cart-items">
                <?php if (empty($cartItems)): ?>
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <h2>Your cart is empty</h2>
                        <p>Browse our products and add items to your cart</p>
                        <a href="/products" class="continue-shopping">Continue Shopping</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="cart-item" data-id="<?php echo $item['id']; ?>">
                            <div class="item-image">
                                <img src="/public/images/products/<?php echo htmlspecialchars($item['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($item['name']); ?>">
                            </div>
                            <div class="item-details">
                                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                                <p class="item-price">$<?php echo number_format($item['price'], 2); ?></p>
                                <div class="quantity-controls">
                                    <button onclick="updateQuantity(<?php echo $item['id']; ?>, 'decrease')" class="quantity-btn">-</button>
                                    <input type="number" value="<?php echo $item['quantity']; ?>" min="1" max="99" 
                                           onchange="updateQuantity(<?php echo $item['id']; ?>, 'set', this.value)">
                                    <button onclick="updateQuantity(<?php echo $item['id']; ?>, 'increase')" class="quantity-btn">+</button>
                                </div>
                            </div>
                            <div class="item-total">
                                <p>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                            </div>
                            <button onclick="removeItem(<?php echo $item['id']; ?>)" class="remove-item">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="cart-summary">
                <h2>Order Summary</h2>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>$<?php echo number_format($subtotal, 2); ?></span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>$<?php echo number_format($shipping, 2); ?></span>
                </div>
                <div class="summary-item total">
                    <span>Total</span>
                    <span>$<?php echo number_format($total, 2); ?></span>
                </div>
                <div class="promo-code">
                    <input type="text" placeholder="Enter promo code">
                    <button>Apply</button>
                </div>
                <a href="/checkout" class="checkout-btn">Proceed to Checkout</a>
                <a href="/products" class="continue-shopping">Continue Shopping</a>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
