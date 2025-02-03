<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, these would come from the database based on the order ID
$order = [
    'id' => 'ORD-12345',
    'date' => '2025-02-01',
    'status' => 'Confirmed',
    'items' => [
        [
            'name' => 'Organic Bananas',
            'quantity' => 2,
            'price' => 2.99,
            'image' => 'bananas.jpg'
        ],
        [
            'name' => 'Fresh Milk',
            'quantity' => 1,
            'price' => 3.49,
            'image' => 'milk.jpg'
        ]
    ],
    'subtotal' => 9.47,
    'shipping' => 5.99,
    'tax' => 0.76,
    'total' => 16.22,
    'shipping_address' => [
        'name' => 'John Doe',
        'street' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'ST',
        'zip' => '12345',
        'phone' => '+1 (555) 123-4567'
    ],
    'payment_method' => 'Credit Card (**** 1234)'
];
?>

<main class="order-confirmation">
    <div class="container">
        <div class="confirmation-content">
            <div class="confirmation-header">
                <i class="fas fa-check-circle"></i>
                <h1>Order Confirmed!</h1>
                <p>Thank you for your purchase. Your order has been successfully placed.</p>
            </div>

            <div class="order-details">
                <div class="order-info">
                    <h2>Order Information</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <span>Order Number:</span>
                            <strong><?php echo htmlspecialchars($order['id']); ?></strong>
                        </div>
                        <div class="info-item">
                            <span>Order Date:</span>
                            <strong><?php echo date('F j, Y', strtotime($order['date'])); ?></strong>
                        </div>
                        <div class="info-item">
                            <span>Order Status:</span>
                            <strong class="status-<?php echo strtolower($order['status']); ?>">
                                <?php echo htmlspecialchars($order['status']); ?>
                            </strong>
                        </div>
                        <div class="info-item">
                            <span>Payment Method:</span>
                            <strong><?php echo htmlspecialchars($order['payment_method']); ?></strong>
                        </div>
                    </div>
                </div>

                <div class="order-items">
                    <h2>Order Items</h2>
                    <div class="items-list">
                        <?php foreach ($order['items'] as $item): ?>
                            <div class="order-item">
                                <img src="/public/images/products/<?php echo htmlspecialchars($item['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($item['name']); ?>">
                                <div class="item-details">
                                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                                    <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
                                </div>
                                <div class="item-total">
                                    $<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="order-summary">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>$<?php echo number_format($order['subtotal'], 2); ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>$<?php echo number_format($order['shipping'], 2); ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Tax</span>
                            <span>$<?php echo number_format($order['tax'], 2); ?></span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span>$<?php echo number_format($order['total'], 2); ?></span>
                        </div>
                    </div>
                </div>

                <div class="shipping-info">
                    <h2>Shipping Information</h2>
                    <div class="address-card">
                        <p><strong><?php echo htmlspecialchars($order['shipping_address']['name']); ?></strong></p>
                        <p><?php echo htmlspecialchars($order['shipping_address']['street']); ?></p>
                        <p>
                            <?php echo htmlspecialchars($order['shipping_address']['city']); ?>,
                            <?php echo htmlspecialchars($order['shipping_address']['state']); ?>
                            <?php echo htmlspecialchars($order['shipping_address']['zip']); ?>
                        </p>
                        <p>Phone: <?php echo htmlspecialchars($order['shipping_address']['phone']); ?></p>
                    </div>
                </div>
            </div>

            <div class="confirmation-actions">
                <a href="/profile/orders" class="view-orders-btn">View All Orders</a>
                <a href="/products" class="continue-shopping-btn">Continue Shopping</a>
            </div>

            <div class="order-help">
                <p>Need help with your order? <a href="/contact">Contact our support team</a></p>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
