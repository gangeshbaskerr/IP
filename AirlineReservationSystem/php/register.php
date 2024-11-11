<!-- register.php -->
<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];

    if ($password === $confirm_password) {
        $conn = new mysqli("localhost", "root", "", "dbAirline");
        $sql = "INSERT INTO tblUsers (userid, password, fullName) VALUES ('$userid', '$password', '$fullname')";
        if ($conn->query($sql) === TRUE) {
            $message = "Registration successful!";
            header("Location: booking.php");
            exit();
        } else {
            $message = "Error: " . $conn->error;
        }
        $conn->close();
    } else {
        $message = "Passwords do not match.";
    }
}
?>

<form action="" method="POST">
    <h2>Register</h2>
    <label for="userid">User ID:</label>
    <input type="text" name="userid" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required>
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" required>
    <button type="submit">Register</button>
    <?php echo "<p>$message</p>"; ?>
</form>
