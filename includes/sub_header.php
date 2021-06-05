<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thuy Linh - My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <a class="navbar-brand" href="index.php">Food. Foodie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo "<li class='nav-item'><a class='nav-link' href='addnewpost.php'>Create a new post</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout</a></li>";
                        if ($_SESSION["username"] == "admin") {
                            echo "<li class='nav-item'><a class='nav-link' href='admin/admin_index.php'>Hello, admin</a></li>";
                        }
                        else {
                            echo "<li class='nav-item'><a class='nav-link' href='index.php'>Hello, " . $_SESSION["username"] . "</a></li>";
                        }
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'>Sign In</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='signup.php'>Create An Account</a></li>";
                    }
                    ?>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <i class="fab fa-facebook-f px-2 font-weight-bold" aria-hidden="true"></i>
                    </li>
                    <li class="nav-item">
                        <i class="fab fa-instagram px-2 font-weight-bold" aria-hidden="true"></i>
                    </li>
                    <li class="nav-item">
                        <i class="fab fa-twitter px-2 font-weight-bold" aria-hidden="true"></i>
                    </li>
                    <li class="nav-item">
                        <i class="fab fa-pinterest px-2 font-weight-bold" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>
        </nav>
    </header>