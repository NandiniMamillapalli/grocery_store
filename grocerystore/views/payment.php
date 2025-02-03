<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, these would come from the session/database
$orderTotal = 49.99;
$shippingCost = 5.99;
$tax = ($orderTotal * 0.08); // 8% tax
$total = $orderTotal + $shippingCost + $tax;
?>

<main class="payment-page">
    <div class="container">
        <h1>Payment</h1>
        
        <div class="payment-content">
            <div class="payment-methods">
                <h2>Select Payment Method</h2>
                
                <div class="payment-options">
                    <div class="payment-option active">
                        <input type="radio" name="payment-method" id="credit-card" checked>
                        <label for="credit-card">
                            <i class="fas fa-credit-card"></i>
                            Credit/Debit Card
                        </label>
                        
                        <div class="payment-form">
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" placeholder="1234 5678 9012 3456" maxlength="19">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" placeholder="MM/YY" maxlength="5">
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" placeholder="123" maxlength="3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="card-name">Name on Card</label>
                                <input type="text" id="card-name" placeholder="John Doe">
                            </div>
                        </div>
                    </div>

                    <div class="payment-option">
                        <input type="radio" name="payment-method" id="paypal">
                        <label for="paypal">
                            <i class="fab fa-paypal"></i>
                            PayPal
                        </label>
                        <div class="payment-form hidden">
                            <p>You will be redirected to PayPal to complete your payment.</p>
                        </div>
                    </div>

                    <div class="payment-option">
                        <input type="radio" name="payment-method" id="apple-pay">
                        <label for="apple-pay">
                            <i class="fab fa-apple-pay"></i>
                            Apple Pay
                        </label>
                        <div class="payment-form hidden">
                            <p>Complete your payment using Apple Pay.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="summary-items">
                    <div class="summary-item">
                        <span>Order Total</span>
                        <span>$<?php echo number_format($orderTotal, 2); ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping</span>
                        <span>$<?php echo number_format($shippingCost, 2); ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Tax</span>
                        <span>$<?php echo number_format($tax, 2); ?></span>
                    </div>
                    <div class="summary-item total">
                        <span>Total</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                </div>

                <div class="billing-address">
                    <h3>Billing Address</h3>
                    <div class="address-selector">
                        <label>
                            <input type="checkbox" id="same-as-shipping" checked>
                            Same as shipping address
                        </label>
                    </div>
                    <div class="billing-form hidden">
                        <!-- Billing address form fields will be shown when checkbox is unchecked -->
                    </div>
                </div>

                <button onclick="processPayment()" class="process-payment-btn">
                    Pay $<?php echo number_format($total, 2); ?>
                </button>
                <a href="/checkout" class="back-btn">Back to Checkout</a>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
