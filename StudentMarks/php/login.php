<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel = "stylesheet" href="/styles.css">
</head>
<body>
    <h>LOGIN</h>
    <form method = "POST" action ="">
        <label for ="rollNumber">Roll Number: </label>
        <input type="text" id = "rollNumber" name = "rollNumber" required>
        <label for="password">Passsword:</label>
        <input type="password" id = "password" name="password" required>
        <br><br>

        <button type="submit">SUBMIT</button>
        
    </form>

</body>
</html>

<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $rollNumber = $_POST['rollNumber'];
        $password = $_POST['password'];
        $conn = new mysqli('localhost', 'root', '', 'dbstudentmarks');
        $sql="SELECT * from tblstudentinfo where rollNumber='$rollNumber'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $student = $result->fetch_assoc();
            if(password_verify($password,$student['password'])){
                $_SESSION['rollNumber']=$student['rollNumber'];
                header("Location: php/dashboard.php");
                exit();
            }
            else{
                echo "<p>Incorrect password please try again</p>";}
        }
        else{
            "<p>Student not found</p>";
        }
    $conn->close();
    }

?>