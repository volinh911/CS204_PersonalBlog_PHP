<?php
include 'includes/sub_header.php';
include 'db.php';

$error = true;

//show post content
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows == 1) {
        $article = $results->fetch_assoc();
        $error = false;
    }
}

//save comment
$errors = [];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $id = $_GET['id'];

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $errors['name'] = "Your Name must be known";
    }

    if (isset($_POST['content'])) {
        $content = $_POST['content'];
    } else {
        $errors['content'] = "Your Comment must not be empty";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO comments (name, content, post_id) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $content, $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $location = "Location: showpost.php?id=" . $id . "&newcomment=true";
            header($location);
        }
    }
}

?>
<!--Main container. Everything must be contained within a top-level container.-->
<div class="container-fluid my-5">
    <!--First row (only row)-->
    <div class="row extra_margin" style="margin-top: 10px;">

        <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
        <div class="col-md-4 col-sm-12 col-xs-12">

            <!-- Div to center the header image/name/social buttons -->
            <div class="text-center">

                <!-- Placeholder image using Placeholder.com -->
                <img src="<?php echo htmlspecialchars($article['imgurl']); ?>" class="img-rounded img-fluid" />

                <!-- Header text (Author's name) -->
                <h4 style="font-family: 'Leckerli One', cursive; color: #9e0640;" class="my-3">Author: <?php echo htmlspecialchars($article['author']); ?></h4>

                <!-- Social buttons using anchor elements and btn-primary class to style -->
                <p>
                    <?php echo htmlspecialchars($article['date_created']); ?>
                </p>

            </div>

        </div> <!-- End Col 1 -->

        <!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
        <div class="col-md-8 col-sm-* col-xs-*">

            <h1 style="font-family: 'Caveat', cursive; color: #fc2600;"><?php echo htmlspecialchars($article['title']); ?></h1>

            <hr>

            <p style="color: #040e97"><?php echo htmlspecialchars($article['content']); ?></p>

        </div> <!-- End column 2 -->

    </div> <!-- End row 1 -->

</div> <!-- End main container -->


<div class="comment container-fluid">
    <hr>
    <h3 class="mb-3" style="font-family: 'Caveat', cursive;">Leave your comment here</h3>

    <form action="" method="POST">
        <input type="text" name="name" class="form-control mb-3" placeholder="Your name here" value="">
        <textarea name="content" class="form-control mb-3" rows="8" cols="80" placeholder="Your comment here"></textarea>
        <button type="submit" class="btn mt-4 btn-block btn-outline-primary mb-5" name="submit">Send comment</button>
    </form>

    <?php

    $post_id = $_GET['id'];
    $sql_comment = "SELECT * FROM comments WHERE post_id = $post_id";
    $results_comment = mysqli_query($conn, $sql_comment);
    if (mysqli_num_rows($results_comment) > 0) {
        while ($row = mysqli_fetch_assoc($results_comment)) {

    ?>

            <div class='card mb-5'>
                <h5 class='card-header' style="color: #fc2600; font-family: 'Caveat', cursive; font-size: 2rem;"><i class="fas fa-user-tag"></i>  <?php echo $row['name']; ?></h5>
                <div class='card-body'>
                    <h5 class='card-title' style="color: #063970;"><i class="fas fa-signature">: </i><?php echo $row['content'] ;?></h5>
                    <p class='card-text'><i class="fas fa-calendar-day">: </i><?php echo $row['date_created'] ;?></p>
                </div>
            </div>

    <?php

        }
    }

    ?>


</div>