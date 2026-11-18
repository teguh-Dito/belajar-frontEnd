<?php
require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST['submit'])){
        $usernameemail = $_POST['usernameemail'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) >0){
            // if($password == $row['password']){
            if(password_verify($password, $row['password'])){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
            }
            else{
                echo "<script>alert('Wrong Password');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="login.php" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" id="usernameemail" name="usernameemail" required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" name="submit" value="Login">
    </form>
    <br>
    <a href="registration.php">Don't have an account? Register here</a>
</body>
</html>