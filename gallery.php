<?php
include_once 'includes/header.php';
include 'db.php';

//db for gallery design section
$gallery_sql = "SELECT * FROM gallery";
$gallery_results = $conn->query($gallery_sql);
if ($gallery_results->num_rows >= 1) {
    $galleries = $gallery_results->fetch_all(MYSQLI_ASSOC);
}
?>

<section class="gallery-content">
    <div class="container-fluid row my-5">
        <?php if (isset($galleries)) :?>
            <?php foreach ($galleries as $gallery):?>
                <div class="col-md-6 col-xs-12 my-3">
                    <div class="card h-100">
                        <img class="card-img-top" style="object-fit: cover; width:100%; height:100%;" src="<?php echo htmlspecialchars($gallery['imgurl']); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?php echo htmlspecialchars($gallery['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($gallery['date_created']); ?></p>
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