<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, these would come from the session/database
$cartTotal = 49.99;
$shippingCost = 5.99;
$tax = ($cartTotal * 0.08); // 8% tax
$total = $cartTotal + $shippingCost + $tax;
?>

<main class="checkout-page">
    <div class="container">
        <h1>Checkout</h1>
        
        <div class="checkout-content">
            <div class="checkout-form">
                <form id="checkoutForm" action="/process-checkout" method="POST">
                    <!-- Shipping Information -->
                    <section class="form-section">
                        <h2>Shipping Information</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                            <div class="form-group full-width">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group full-width">
                                <label for="address">Street Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" required>
                            </div>
                            <div class="form-group">
                                <label for="zipCode">ZIP Code</label>
                                <input type="text" id="zipCode" name="zipCode" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                        </div>
                    </section>

                    <!-- Payment Information -->
                    <section class="form-section">
                        <h2>Payment Information</h2>
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="cardNumber" name="cardNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="expiryDate">Expiry Date</label>
                                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" required>
                            </div>
                            <div class="form-group full-width">
                                <label for="nameOnCard">Name on Card</label>
                                <input type="text" id="nameOnCard" name="nameOnCard" required>
                            </div>
                        </div>
                    </section>

                    <!-- Additional Notes -->
                    <section class="form-section">
                        <h2>Additional Notes</h2>
                        <div class="form-group full-width">
                            <label for="notes">Order Notes (Optional)</label>
                            <textarea id="notes" name="notes" rows="4"></textarea>
                        </div>
                    </section>
                </form>
            </div>

            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="summary-items">
                    <?php foreach ($cartItems ?? [] as $item): ?>
                    <div class="summary-item">
                        <span><?php echo htmlspecialchars($item['name']); ?> (x<?php echo $item['quantity']; ?>)</span>
                        <span>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="summary-totals">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>$<?php echo number_format($cartTotal, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>$<?php echo number_format($shippingCost, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Tax</span>
                        <span>$<?php echo number_format($tax, 2); ?></span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                </div>
                <button type="submit" form="checkoutForm" class="place-order-btn">Place Order</button>
                <a href="/cart" class="back-to-cart">Back to Cart</a>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
