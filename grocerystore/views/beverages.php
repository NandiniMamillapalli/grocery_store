<?php
// In a real application, this data would come from a database
$categoryData = [
    'title' => 'Beverages',
    'description' => 'Refresh yourself with our wide selection of beverages.',
    'image' => 'beverages-banner.jpg',
    'products' => [
        [
            'id' => 10,
            'name' => 'Fresh Orange Juice',
            'price' => 4.99,
            'description' => 'Freshly squeezed orange juice, no added sugar.',
            'image' => 'orange-juice.jpg'
        ],
        [
            'id' => 11,
            'name' => 'Green Tea',
            'price' => 3.49,
            'description' => 'Organic green tea bags, pack of 20.',
            'image' => 'green-tea.jpg'
        ],
        [
            'id' => 12,
            'name' => 'Sparkling Water',
            'price' => 1.99,
            'description' => 'Natural sparkling mineral water.',
            'image' => 'sparkling-water.jpg'
        ]
    ]
];

// Pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalPages = ceil(count($categoryData['products']) / 12);

// Include the category template
require_once __DIR__ . '/category-template.php';
?>
