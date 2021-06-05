<?php
include_once '../admin/admin_header.php';
include '../db.php';

$errors = [];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $file = $_FILES['image']['name'];

    //ensure the radio input is set, if so assign to var
    // else output an error
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $errors['title'] = "Title must be known";
    }

    if (isset($_POST['author'])) {
        $author = $_POST['author'];
    } else {
        $errors['author'] = "Author must be known";
    }

    if (isset($_POST['content'])) {
        $content = $_POST['content'];
    } else {
        $errors['content'] = "Content must be not empty";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO post (title, author, content, imgurl) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $author, $content, $file);
        move_uploaded_file($_FILES['image']['tmp_name'], "$file");
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $location = "Location: ./../showpost.php?id=" . $stmt->insert_id . "&new=true";
            header($location);
        }
    }
}

?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            <?php endif; ?>
            <h1 class="display-4 text-center mt-3 mb-2" style="font-family: 'Caveat', cursive; font-size: 3rem"><i class="far fa-newspaper"></i> Create a new post</h1>
            <form class="" action="../admin/admin_create.php" method="post" enctype="multipart/form-data">
                <label class="font-weight-bold" for="title">Post Title</label>
                <input type="text" name="title" class="form-control mb-3" placeholder="Post title..." value="">

                <label class="font-weight-bold" for="title">Post Author</label>
                <input type="text" name="author" class="form-control mb-3" placeholder="Post author..." value="">

                <label class="font-weight-bold" for="imgurl">Upload Image</label>
                <input type="file" name="image" class="form-control mb-3">

                <!-- <label for="imgurl">Post Image</label>
                <input type="text" name="imgurl" class="form-control" placeholder="URL link to post image...." value="">-->
                <label class="font-weight-bold" for="body">Post Content</label>
                <textarea name="content" class="form-control mb-3" rows="8" cols="80"></textarea>

                <button type="submit" class="btn mt-4 btn-block btn-outline-primary" name="submit">Create New Post</button>
            </form>

        </div>
    </div>
</div>