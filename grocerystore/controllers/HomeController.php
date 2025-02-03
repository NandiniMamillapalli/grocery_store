<?php
require_once __DIR__ . '/../config/config.php';

class HomeController {
    public function index() {
        $pageTitle = 'Home';
        require_once __DIR__ . '/../views/index.php';
    }

    public function about() {
        $pageTitle = 'About Us';
        require_once __DIR__ . '/../views/about.php';
    }

    public function contact() {
        $pageTitle = 'Contact Us';
        require_once __DIR__ . '/../views/contact.php';
    }

    public function products() {
        $pageTitle = 'Our Products';
        require_once __DIR__ . '/../views/products.php';
    }

    public function cart() {
        $pageTitle = 'Shopping Cart';
        require_once __DIR__ . '/../views/cart.php';
    }
}
?>
