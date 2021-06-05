<?php 

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    include './../db.php';
    include './../includes/functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false){
        header("location: .../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: .../login.php");
    exit();
}