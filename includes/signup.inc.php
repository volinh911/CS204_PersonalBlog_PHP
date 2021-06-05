<?php 

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdrepeat"];

    include './../db.php';
    include './../includes/functions.inc.php';

    if (emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false){
        header("location: .../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false){
        header("location: .../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: .../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: .../signup.php?error=passworddontmatch");
        exit();
    }

    if (userExists($conn, $username, $email) !== false) {
        header("location: .../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $pwd);
} 
else {
    header("location: .../signup.php");
    exit();
}