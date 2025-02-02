<?php
// Include the header
require_once __DIR__ . '/../partials/Mainheader.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $base_url . '/login.php');
    exit;
}

// In a real application, this would come from the database
$user = [
    'id' => $_SESSION['user_id'] ?? 1,
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '+1 (555) 123-4567',
    'address' => [
        'street' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'ST',
        'zip' => '12345'
    ],
    'orders' => [
        [
            'id' => 'ORD-001',
            'date' => '2025-01-28',
            'total' => 45.97,
            'status' => 'Delivered'
        ],
        [
            'id' => 'ORD-002',
            'date' => '2025-01-15',
            'total' => 32.50,
            'status' => 'Processing'
        ]
    ]
];
?>

<main class="profile-page">
    <div class="container">
        <h1>My Profile</h1>

        <div class="profile-content">
            <aside class="profile-nav">
                <nav>
                    <a href="#personal-info" class="active">Personal Information</a>
                    <a href="#orders">Order History</a>
                    <a href="#addresses">Saved Addresses</a>
                    <a href="#payment-methods">Payment Methods</a>
                    <a href="#preferences">Preferences</a>
                </nav>
            </aside>

            <div class="profile-sections">
                <section id="personal-info" class="profile-section">
                    <h2>Personal Information</h2>
                    <form class="profile-form" id="personalInfoForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                        </div>
                        <button type="submit" class="save-btn">Save Changes</button>
                    </form>
                </section>

                <section id="orders" class="profile-section">
                    <h2>Order History</h2>
                    <div class="orders-list">
                        <?php if (empty($user['orders'])): ?>
                            <p>No orders found.</p>
                        <?php else: ?>
                            <?php foreach ($user['orders'] as $order): ?>
                                <div class="order-card">
                                    <div class="order-header">
                                        <h3>Order #<?php echo htmlspecialchars($order['id']); ?></h3>
                                        <span class="order-status <?php echo strtolower($order['status']); ?>">
                                            <?php echo htmlspecialchars($order['status']); ?>
                                        </span>
                                    </div>
                                    <div class="order-details">
                                        <p>Date: <?php echo date('F j, Y', strtotime($order['date'])); ?></p>
                                        <p>Total: $<?php echo number_format($order['total'], 2); ?></p>
                                    </div>
                                    <a href="/order/<?php echo $order['id']; ?>" class="view-order">View Details</a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </section>

                <section id="addresses" class="profile-section">
                    <h2>Saved Addresses</h2>
                    <div class="addresses-list">
                        <div class="address-card">
                            <h3>Default Address</h3>
                            <p><?php echo htmlspecialchars($user['address']['street']); ?></p>
                            <p>
                                <?php echo htmlspecialchars($user['address']['city']); ?>,
                                <?php echo htmlspecialchars($user['address']['state']); ?>
                                <?php echo htmlspecialchars($user['address']['zip']); ?>
                            </p>
                            <div class="address-actions">
                                <button onclick="editAddress(1)" class="edit-btn">Edit</button>
                                <button onclick="deleteAddress(1)" class="delete-btn">Delete</button>
                            </div>
                        </div>
                        <button class="add-address-btn">Add New Address</button>
                    </div>
                </section>

                <section id="payment-methods" class="profile-section">
                    <h2>Payment Methods</h2>
                    <div class="payment-methods-list">
                        <div class="payment-card">
                            <div class="card-icon"><i class="fas fa-credit-card"></i></div>
                            <div class="card-details">
                                <h3>Credit Card</h3>
                                <p>**** **** **** 1234</p>
                                <p>Expires: 12/25</p>
                            </div>
                            <div class="card-actions">
                                <button onclick="editPaymentMethod(1)" class="edit-btn">Edit</button>
                                <button onclick="deletePaymentMethod(1)" class="delete-btn">Delete</button>
                            </div>
                        </div>
                        <button class="add-payment-btn">Add New Payment Method</button>
                    </div>
                </section>

                <section id="preferences" class="profile-section">
                    <h2>Preferences</h2>
                    <form class="preferences-form">
                        <div class="preference-group">
                            <h3>Email Notifications</h3>
                            <label>
                                <input type="checkbox" name="order_updates" checked>
                                Order Updates
                            </label>
                            <label>
                                <input type="checkbox" name="promotions" checked>
                                Promotions and Deals
                            </label>
                            <label>
                                <input type="checkbox" name="newsletter">
                                Newsletter
                            </label>
                        </div>
                        <button type="submit" class="save-btn">Save Preferences</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
