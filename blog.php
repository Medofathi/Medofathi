<?php include __DIR__ . '/includes/header.php'; ?>
<?php require_once __DIR__ . '/includes/db.php'; ?>

<!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>From Blog</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Blog</p>
                    <h2>Latest news & articles directly from our blog</h2>
                </div>
                <div class="row">
                    <?php
                        $result = $mysqli->query("SELECT id, title, content, image, created_at FROM posts ORDER BY created_at DESC");
                        $posts = $result->fetch_all(MYSQLI_ASSOC);
                        
                        if (empty($posts)):
                    ?>
                        <div class="col-12">
                            <p style="text-align: center; padding: 40px 0; font-size: 16px; color: #666;">
                                No articles published yet. Check back soon!
                            </p>
                        </div>
                    <?php
                        else:
                            foreach ($posts as $post):
                    ?>
                        <div class="col-lg-4" style="margin-bottom: 30px;">
                            <div class="blog-item">
                                <?php if (!empty($post['image'])): ?>
                                    <div class="blog-img">
                                        <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" style="height: 250px; object-fit: cover; width: 100%;">
                                    </div>
                                <?php endif; ?>
                                <div class="blog-text">
                                    <h3><a href="#"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                                    <p>
                                        <?php echo htmlspecialchars(substr($post['content'], 0, 150)) . (strlen($post['content']) > 150 ? '...' : ''); ?>
                                    </p>
                                </div>
                                <div class="blog-meta">
                                    <p><i class="fa fa-calendar"></i><?php echo date('M d, Y', strtotime($post['created_at'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <!-- Blog End -->

<?php include __DIR__ . '/includes/footer.php'; ?>
