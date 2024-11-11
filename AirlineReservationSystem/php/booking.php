<!-- booking.php -->
<form action="confirmation.php" method="POST">
    <h2>Flight Booking</h2>
    <label for="source">Source:</label>
    <input type="text" name="source" required>
    <label for="destination">Destination:</label>
    <input type="text" name="destination" required>
    <label for="date">Date:</label>
    <input type="date" name="date" required>
    <label for="time">Time:</label>
    <input type="time" name="time" required>
    <button type="submit">Book Flight</button>
</form>
