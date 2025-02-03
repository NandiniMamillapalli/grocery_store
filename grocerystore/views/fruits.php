<?php
// In a real application, this data would come from a database
$categoryData = [
    'title' => 'Fresh Fruits',
    'description' => 'Browse our selection of fresh, seasonal fruits sourced from local farmers.',
    'image' => 'fruits-banner.jpg',
    'products' => [
        [
            'id' => 1,
            'name' => 'Organic Bananas',
            'price' => 2.99,
            'description' => 'Fresh organic bananas, perfect for smoothies and snacks.',
            'image' => 'bananas.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Red Apples',
            'price' => 3.49,
            'description' => 'Sweet and crispy red apples, great for eating fresh or baking.',
            'image' => 'apples.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Fresh Oranges',
            'price' => 4.99,
            'description' => 'Juicy oranges packed with vitamin C.',
            'image' => 'oranges.jpg'
        ]
    ]
];

// Pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalPages = ceil(count($categoryData['products']) / 12);

// Include the category template
require_once __DIR__ . '/category-template.php';
?>
