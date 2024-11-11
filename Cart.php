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
    <h1>SHOP</h1><br>
    <p>To confirm your orders please enter the details</p>
    <form method="POST" action="Confirmation.php">
        <label for="name">Name : </label>
        <input type="text" name = "name" id="name" required><br>
        <label for="email">Email : </label>
        <input type="text" name = "email" id="email" required><br>
        <label for="mobile">Phone Number: </label>
        <input type="text" name = "mobile" id="mobile" required><br>
        <label for="address">Address : </label>
        <input type="text" name = "address" id="address" required><br>
        <a href = "Confirmation.php"><button type="submit">Place Order</button></a>
    </form>
</body>
</html>