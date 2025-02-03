<!--  -->
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Mart - Online Grocery Store</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Auth Modal Styles */
        .auth-form {
            padding: 20px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .auth-form input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .auth-form button {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .auth-form button:hover {
            background-color: #45a049;
        }

        .auth-form p {
            text-align: center;
            margin-top: 15px;
        }

        .auth-form a {
            color: #4CAF50;
            text-decoration: none;
        }

        .auth-form a:hover {
            text-decoration: underline;
        }

        #loginModal .modal-content {
            max-width: 450px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #loginModal .modal-header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #loginModal .modal-header h2 {
            margin: 0;
            font-size: 24px;
        }

        #loginModal .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        #loginModal .close:hover {
            color: #f1f1f1;
        }
    </style>
</head>
<body>
    <header>
        <div class="promo-banner" id="promoBanner">
            Special Offer: Free delivery on orders above $50! Use code: FRESH50 
            <button class="close-banner" onclick="closeBanner()">&times;</button>
        </div>
        <!-- style of navbar -->
        <nav class="navbar">
            <div class="left-section">
                <a href="profile.php" class="profile-btn">
                    <div class="profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="profile-text">My Profile</span>
                </a>
                <div class="logo">Fresh Mart</div>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search products...">
                <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
            </div>
            <div class="nav-links">
                <button class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="wishlist-btn" onclick="toggleWishlist()">
                    <i class="fas fa-heart"></i>
                    <span id="wishlistCount">0</span>
                </button>
                <button class="cart-btn" onclick="toggleCart()">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cartCount">0</span>
                </button>
                <button class="login-btn" onclick="toggleLoginForm()">Login</button>
                <div class="location-picker" onclick="toggleLocationPicker()">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="currentLocation">Select Location</span>
                </div>
            </div>
        </nav>
        <nav class="category-nav">
            <button class="category-btn active" onclick="filterByCategory('all')">All</button>
            <button class="category-btn" onclick="filterByCategory('fruits')">Fruits</button>
            <button class="category-btn" onclick="filterByCategory('vegetables')">Vegetables</button>
            <button class="category-btn" onclick="filterByCategory('dairy')">Dairy</button>
            <button class="category-btn" onclick="filterByCategory('beverages')">Beverages</button>
        </nav>
    </header>

    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <main>
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
    </main>

    <!-- Shopping Cart Modal -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Shopping Cart</h2>
                <span class="close" onclick="toggleCart()">&times;</span>
            </div>
            <div id="cartItems" class="cart-items">
                <!-- Cart items will be displayed here -->
            </div>
            <div class="cart-total">
                <h3>Total: $<span id="cartTotal">0.00</span></h3>
                <button class="checkout-btn" onclick="checkout()">Checkout</button>
            </div>
        </div>
    </div>

    <!-- Wishlist Modal -->
    <div id="wishlistModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>My Wishlist</h2>
                <span class="close" onclick="toggleWishlist()">&times;</span>
            </div>
            <div id="wishlistItems" class="wishlist-items">
                <!-- Wishlist items will be displayed here -->
            </div>
        </div>
    </div>

     <!-- Login Modal -->
     <div id="loginModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="authTitle">Login</h2>
                <span class="close" onclick="toggleLoginForm()">&times;</span>
            </div>
            <div id="loginForm" class="auth-form">
                <input type="text" placeholder="Username" id="loginUsername" required>
                <input type="password" placeholder="Password" id="loginPassword" required>
                <button onclick="loginUser()">Login</button>
                <p>Not registered? <a href="#" onclick="toggleAuthForms()">Register here</a></p>
            </div>
            <div id="registrationForm" class="auth-form" style="display:none;">
                <input type="text" placeholder="Username" id="registerUsername" required>
                <input type="email" placeholder="Email" id="registerEmail" required>
                <input type="password" placeholder="Password" id="registerPassword" required>
                <input type="password" placeholder="Confirm Password" id="registerConfirmPassword" required>
                <button onclick="registerUser()">Register</button>
                <p>Already registered? <a href="#" onclick="toggleAuthForms()">Login here</a></p>
            </div>
        </div>
    </div>

    <!-- Product Quick View Modal -->
    <div id="quickViewModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Product Details</h2>
                <span class="close" onclick="closeQuickView()">&times;</span>
            </div>
            <div id="quickViewContent">
                <!-- Product details will be displayed here -->
            </div>
        </div>
    </div>

    <!-- Location Picker Modal -->
    <div id="locationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Select Your Location</h2>
                <span class="close" onclick="toggleLocationPicker()">&times;</span>
            </div>
            <div class="location-form">
                <input type="text" id="locationSearch" placeholder="Enter your address">
                <div id="locationSuggestions">
                    <!-- Location suggestions will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Alert Modal -->
    <div id="inventoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Low Stock Alert</h2>
                <span class="close" onclick="closeInventoryAlert()">&times;</span>
            </div>
            <div class="inventory-content">
                <p>Some items in your cart are running low:</p>
                <ul id="lowStockList"></ul>
                <button onclick="proceedToCheckout()">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <div id="authContainer" style="display:none;">
        <!-- Removed duplicate login/registration forms -->
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: support@freshmart.com</p>
                <p>Phone: (555) 123-4567</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
            <div class="footer-section">
                <h3>Download Our App</h3>
                <div class="app-links">
                    <a href="#" class="app-button">
                        <i class="fab fa-apple"></i> App Store
                    </a>
                    <a href="#" class="app-button">
                        <i class="fab fa-google-play"></i> Google Play
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Fresh Mart. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="auth.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registrationForm').style.display = 'none';
        });

        async function logout() {
            try {
                await fetch('logout.php');
                window.location.href = 'index.php';
            } catch (error) {
                alert('Failed to logout');
            }
        }

        function toggleTheme() {
            const html = document.documentElement;
            if (html.getAttribute('data-theme') === 'light') {
                html.setAttribute('data-theme', 'dark');
            } else {
                html.setAttribute('data-theme', 'light');
            }
        }
    </script>
    <script>
        let users = {};

        function loginUser() {
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            if (users[username] && users[username] === password) {
                alert('Login successful!');
                // Proceed with login actions
            } else {
                alert('Invalid username or password.');
            }
        }

        function registerUser() {
            const username = document.getElementById('registerUsername').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;

            if (users[username]) {
                alert('Username already exists.');
            } else if (password !== confirmPassword) {
                alert('Passwords do not match.');
            } else {
                users[username] = password;
                alert('Registration successful! You can now log in.');
                toggleAuthForms();
            }
        }

        function toggleAuthForms() {
            const loginForm = document.getElementById('loginForm');
            const registrationForm = document.getElementById('registrationForm');
            const authTitle = document.getElementById('authTitle');
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registrationForm.style.display = 'none';
                authTitle.textContent = 'Login';
            } else {
                loginForm.style.display = 'none';
                registrationForm.style.display = 'block';
                authTitle.textContent = 'Register';
            }
        }
    </script>

</body>
</html>
