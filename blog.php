<?php
include_once 'includes/header.php';
include 'db.php';

//db for gallery design section
$post_sql = "SELECT * FROM post";
$post_results = $conn->query($post_sql);
if ($post_results->num_rows >= 1) {
    $posts = $post_results->fetch_all(MYSQLI_ASSOC);
}
?>

<section class="blog-content">
    <div class="container-fluid row my-5">
    <?php if (isset($posts)) :?>
            <?php foreach ($posts as $post):?>
                <div class="col-md-4 col-xs-12 my-3">
                    <div class="card h-100">
                        <img class="card-img-top" style="object-fit: cover; width:100%; height:100%;" src="<?php echo htmlspecialchars($post['imgurl']); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold" style="color: #fc2600; font-family: 'Caveat', cursive;"><?php echo htmlspecialchars($post['title']); ?></h5>
                            <p class="card-text text-right" style="font-family: 'Caveat', cursive;"><?php echo htmlspecialchars($post['author']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars(filter_var(substr($post['content'], 0, 80), FILTER_SANITIZE_STRING)); ?></p>
                            <a href="showpost.php?id=<?php echo $post['ID']; ?>" style="color: #27ae60;">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php
include_once 'includes/footer.php';
?>