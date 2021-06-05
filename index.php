<?php
include_once 'includes/header.php';
include 'db.php';

//db for gallery design section
$gallery_sql = "SELECT * FROM gallery LIMIT 6";
$gallery_results = $conn->query($gallery_sql);
if ($gallery_results->num_rows >= 1) {
    $galleries = $gallery_results->fetch_all(MYSQLI_ASSOC);
}

//db for blog section
$post_sql = "SELECT * FROM post LIMIT 6";
$post_results = $conn->query($post_sql);
if ($post_results->num_rows >= 1) {
    $posts = $post_results->fetch_all(MYSQLI_ASSOC);
}
?>

<section class="gallery">
    <div class="container-fluid">
        <div class="title">
            <h2 style="font-family: 'Leckerli One', cursive;">Gallery of <span style="font-family: 'Leckerli One', cursive; color: rgb(211, 17, 66);">Food. Foodie</span></h2>
            <p>recent arts & designs on the food</p>
        </div>

        <div class="row">
            <?php if (isset($galleries)) : ?>
                <?php foreach ($galleries as $gallery) : ?>
                    <div class="one col-lg-4 col-md-6 col-12 mb-5">
                        <img class="img-fluid" src="<?php echo htmlspecialchars($gallery['imgurl']); ?>" alt="">
                        <div class="text w-75 h-50 text-light p-4">
                            <p class="mb-5"><?php echo htmlspecialchars($gallery['date_created']); ?></p>
                            <h4><?php echo htmlspecialchars($gallery['title']); ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="blog">
    <div class="container-fluid">
        <div class="title">
            <h2 style="font-family: 'Leckerli One', cursive;">Featured Blog of <span style="font-family: 'Leckerli One', cursive; color: rgb(211, 17, 66);">Food. Foodie</span></h2>
            <p>featured blogs about the food</p>
        </div>

        <div class="row">
            <?php if (isset($posts)) : ?>
                <?php foreach ($posts as $post) : ?>
                    <div class="two col-lg-4 col-md-6 col-12 mb-5">
                        <img class="img-fluid pb-3" style="object-fit: cover; width:400px; height:400px;" src="<?php echo htmlspecialchars($post['imgurl']); ?>" alt="">
                        <h3 style="color: #fc2600; font-family: 'Caveat', cursive;"><?php echo htmlspecialchars($post['title']); ?></h4>
                        <p class="mb-5 font-weight-bold"><?php echo htmlspecialchars($post['date_created']); ?></p>
                        <a href="showpost.php?id=<?php echo $post['ID']; ?>">Read more</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="subscribe-section container p-5 my-5">
    <div class="row justify-content-between align-items-center">
        <div class="content col-lg-6 col-md-6 col-12">
            <h3>Subscribe to new posts</h3>
        </div>
        <div class="sub col-lg-6 col-md-6 col-12 justify-content-between align-items-center">
            <input class="py-2 px-3 col-lg-6 col-md-12 w-100 my-1" type="email" name="" placeholder="Your Email Address">
            <button class="btn text-uppercase col-lg-5 col-md-12">Subscribe</button>
        </div>
    </div>
</section>



<?php
include_once 'includes/footer.php';
?>