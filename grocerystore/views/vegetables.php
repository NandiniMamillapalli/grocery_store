<?php
// In a real application, this data would come from a database
$categoryData = [
    'title' => 'Fresh Vegetables',
    'description' => 'Explore our wide variety of fresh, locally sourced vegetables.',
    'image' => 'vegetables-banner.jpg',
    'products' => [
        [
            'id' => 4,
            'name' => 'Fresh Tomatoes',
            'price' => 2.49,
            'description' => 'Ripe, juicy tomatoes perfect for salads and cooking.',
            'image' => 'tomatoes.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Organic Carrots',
            'price' => 1.99,
            'description' => 'Sweet and crunchy organic carrots.',
            'image' => 'carrots.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Green Lettuce',
            'price' => 2.29,
            'description' => 'Crisp and fresh green lettuce.',
            'image' => 'lettuce.jpg'
        ]
    ]
];

// Pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalPages = ceil(count($categoryData['products']) / 12);

// Include the category template
require_once __DIR__ . '/category-template.php';
?>
