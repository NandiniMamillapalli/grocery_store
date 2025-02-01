<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';
?>

<main class="error-page">
    <div class="container">
        <div class="error-content">
            <h1>404</h1>
            <h2>Page Not Found</h2>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="error-actions">
                <a href="/" class="primary-btn">Go to Homepage</a>
                <a href="/products" class="secondary-btn">Browse Products</a>
            </div>
        </div>
    </div>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
