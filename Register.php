<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Shopping</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../index.php">Login</a></li>
            <li><a href="Register.php">Register</a></li>
            <li><a href="Shop.php">Shop</a></li>
            <li><a href="Cart.php">Cart</a></li>
        </ul>
    </nav>
    <h1>Register</h1><br>
    <form method="POST" action="">
        <label for="name">Name : </label>
        <input type="text" name = "name" id="name" required><br>
        <label for="email">Email : </label>
        <input type="text" name = "email" id="email" required><br>
        <label for="password">Password : </label>
        <input type="password" name = "password" id="password" required><br>
        <label for="confirm_password">Confirm Password : </label>
        <input type="password" name = "confirm_password" id="confirm_password" required><br>
        <button type="submit">REGISTER</button><br>
    </form>
</body>
</html>

<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $confirm_password = $_POST["confirm_password"];
        $password = $_POST["password"];
        $conn = new mysqli("localhost", "root", "", "dborders");
        $sql = "INSERT INTO tblcustomers (name, email, password) VALUES ('$name','$email','$password')";
        $result = $conn->query($sql);
        if($password == $confirm_password){
            echo "<p> Registration Successfull </p>";
            header("Location: Shop.php");
            exit();
        }
        else{
            echo "<p>Passwords do not match</p>";
        }
    $conn->close();
    }   
?>