// Handle promo code application
document.getElementById('apply-promo').addEventListener('click', function() {
    const promoInput = document.getElementById('promo').value.trim();
    if (promoInput === 'DISCOUNT10') {
        alert('Promo code applied! You get 10% off.');
    } else {
        alert('Invalid promo code.');
    }
});

// Handle form submission
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Your order has been placed successfully!');
});