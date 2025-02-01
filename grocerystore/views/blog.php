<?php
// Include the header
require_once __DIR__ . '/../partials/header.php';

// In a real application, blog posts would come from a database
$blogPosts = [
    [
        'id' => 1,
        'title' => 'The Benefits of Organic Produce',
        'excerpt' => 'Discover why organic produce is better for your health and the environment...',
        'author' => 'John Doe',
        'date' => '2025-01-28',
        'image' => 'organic-produce.jpg',
        'category' => 'Health'
    ],
    [
        'id' => 2,
        'title' => 'Seasonal Cooking: Spring Edition',
        'excerpt' => 'Make the most of spring vegetables with these delicious recipes...',
        'author' => 'Jane Smith',
        'date' => '2025-01-25',
        'image' => 'spring-cooking.jpg',
        'category' => 'Recipes'
    ],
    // Add more blog posts as needed
];
?>

<main class="blog-page">
    <section class="blog-hero">
        <div class="container">
            <h1>Fresh Mart Blog</h1>
            <p>Stay updated with the latest news, recipes, and healthy living tips</p>
        </div>
    </section>

    <section class="blog-content">
        <div class="container">
            <div class="blog-grid">
                <div class="blog-main">
                    <?php foreach ($blogPosts as $post): ?>
                    <article class="blog-post">
                        <div class="post-image">
                            <img src="/public/images/blog/<?php echo htmlspecialchars($post['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($post['title']); ?>">
                            <span class="category"><?php echo htmlspecialchars($post['category']); ?></span>
                        </div>
                        <div class="post-content">
                            <h2><a href="/blog/<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
                            <div class="post-meta">
                                <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($post['author']); ?></span>
                                <span><i class="fas fa-calendar"></i> <?php echo date('F j, Y', strtotime($post['date'])); ?></span>
                            </div>
                            <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            <a href="/blog/<?php echo $post['id']; ?>" class="read-more">Read More</a>
                        </div>
                    </article>
                    <?php endforeach; ?>

                    <div class="pagination">
                        <button class="prev-page" disabled>&lt; Previous</button>
                        <div class="page-numbers">
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                        </div>
                        <button class="next-page">Next &gt;</button>
                    </div>
                </div>

                <aside class="blog-sidebar">
                    <div class="sidebar-widget">
                        <h3>Categories</h3>
                        <ul class="category-list">
                            <li><a href="#">Health (5)</a></li>
                            <li><a href="#">Recipes (8)</a></li>
                            <li><a href="#">Nutrition (4)</a></li>
                            <li><a href="#">Lifestyle (6)</a></li>
                            <li><a href="#">News (3)</a></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Recent Posts</h3>
                        <ul class="recent-posts">
                            <?php foreach (array_slice($blogPosts, 0, 3) as $post): ?>
                            <li>
                                <a href="/blog/<?php echo $post['id']; ?>">
                                    <img src="/public/images/blog/<?php echo htmlspecialchars($post['image']); ?>" 
                                         alt="<?php echo htmlspecialchars($post['title']); ?>">
                                    <div>
                                        <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                                        <span><?php echo date('F j, Y', strtotime($post['date'])); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Newsletter</h3>
                        <form class="newsletter-form">
                            <p>Subscribe to our newsletter for the latest updates and exclusive offers!</p>
                            <input type="email" placeholder="Your email address" required>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

<?php
// Include the footer
require_once __DIR__ . '/../partials/footer.php';
?>
