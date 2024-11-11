<!-- login.php -->
<?php
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $conn = new mysqli("localhost", "root", "", "dbAirline");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tblUsers WHERE userid = '$userid' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['userid'] = $userid;
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
    $conn->close();
}
?>

<form action="" method="POST">
    <h2>Login</h2>
    <label for="userid">User ID:</label>
    <input type="text" name="userid" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
    <?php echo "<p>$error</p>"; ?>
</form>
