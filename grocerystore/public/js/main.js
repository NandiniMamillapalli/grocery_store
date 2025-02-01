// Cart functionality
let cart = [];

function addToCart(productId) {
    cart.push(productId);
    updateCartCount();
    showNotification('Product added to cart!');
}

function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('show');
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 2000);
    }, 100);
}

// Modal functionality
function toggleLoginForm() {
    const modal = document.getElementById('loginModal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

function toggleForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const authTitle = document.getElementById('authTitle');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        authTitle.textContent = 'Login';
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        authTitle.textContent = 'Register';
    }
}

// Form submissions
function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    // Here you would typically make an API call to your backend
    console.log('Login attempt:', { email, password });
    
    // For demo purposes
    showNotification('Login successful!');
    toggleLoginForm();
}

function handleRegister(event) {
    event.preventDefault();
    const name = document.getElementById('reg-name').value;
    const email = document.getElementById('reg-email').value;
    const password = document.getElementById('reg-password').value;
    
    // Here you would typically make an API call to your backend
    console.log('Register attempt:', { name, email, password });
    
    // For demo purposes
    showNotification('Registration successful!');
    toggleForms();
}

function handleSubscribe(event) {
    event.preventDefault();
    const email = document.getElementById('subscribeEmail').value;
    
    // Here you would typically make an API call to your backend
    console.log('Subscribe attempt:', { email });
    
    // For demo purposes
    showNotification('Successfully subscribed to newsletter!');
    event.target.reset();
}

// Quick view functionality
function quickView(productId) {
    // Here you would typically fetch product details and show in a modal
    console.log('Quick view:', productId);
    showNotification('Quick view coming soon!');
}

// Promo banner
function closeBanner() {
    const banner = document.getElementById('promoBanner');
    banner.style.display = 'none';
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('loginModal');
        if (event.target === modal) {
            toggleLoginForm();
        }
    }

    // Initialize cart count
    updateCartCount();
});
