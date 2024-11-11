<!-- confirmation.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $time = $_POST['time'];
}
?>

<h2>Booking Confirmation</h2>
<p>Your flight from <?php echo $source; ?> to <?php echo $destination; ?> on <?php echo $date; ?> at <?php echo $time; ?> has been successfully booked!</p>
