<?php
// In a real application, this data would come from a database
$categoryData = [
    'title' => 'Dairy Products',
    'description' => 'Fresh dairy products from local farms, including milk, cheese, and yogurt.',
    'image' => 'dairy-banner.jpg',
    'products' => [
        [
            'id' => 7,
            'name' => 'Fresh Milk',
            'price' => 3.99,
            'description' => 'Farm-fresh whole milk.',
            'image' => 'milk.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Greek Yogurt',
            'price' => 4.49,
            'description' => 'Creamy Greek yogurt, perfect for breakfast or snacks.',
            'image' => 'yogurt.jpg'
        ],
        [
            'id' => 9,
            'name' => 'Cheddar Cheese',
            'price' => 5.99,
            'description' => 'Aged cheddar cheese, great for cooking or snacking.',
            'image' => 'cheese.jpg'
        ]
    ]
];

// Pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalPages = ceil(count($categoryData['products']) / 12);

// Include the category template
require_once __DIR__ . '/category-template.php';
?>
