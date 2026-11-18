<?php 
require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        // Check duplicate username or email
        $stmt = mysqli_prepare($conn, "SELECT id FROM tb_user WHERE username = ? OR email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $duplicate = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($duplicate) > 0){
            echo "<script>alert('Username or Email has already taken');</script>";
        }
        else{
            if($password === $confirmpassword){

                // Hash password before saving
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $stmt = mysqli_prepare($conn, "INSERT INTO tb_user (name, username, email, password) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPassword);

                if(mysqli_stmt_execute($stmt)){
                    echo "<script>alert('Registration Successful');</script>";
                }
                else{
                    echo "<script>alert('Registration Failed');</script>";
                }
            }
            else{
                echo "<script>alert('Password does not match');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration Form</h2>

    <form action="registration.php" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="username">Username : </label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email : </label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpassword">Confirm Password : </label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>
        
        <input type="submit" name="submit" value="Register">
    </form>

    <br>
    <a href="login.php">Already have an account? Login here</a>
</body>
</html>
