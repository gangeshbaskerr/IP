<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dborders");

// Fetch products from tblProducts
$sql = "SELECT * FROM tblproducts";
$result = $conn->query($sql);

$tax_rate = 0.08; // Example tax rate of 8%
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Page</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script>
        function calculateTotal() {
            let total =0;
            const tax_rate = <?php echo $tax_rate; ?>;
            const quantities = document.querySelectorAll('.quantity');
            quantities.forEach((quantity) =>{
                const price = quantity.getAttribute('data-price');
                const qty = quantity.value || 0;
                total += price * qty;
            });
            const tax = total*tax_rate;
            const sum_total = total + tax;
            document.getElementById('tax').textContent = tax;
            document.getElementById('total').textContent = total;
            document.getElementById('sumtotal').textContent = sum_total;}

    </script>
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
    <h2>Products</h2>
    <form method="POST" action="cart.php">
        <table border="1">
            <tr>
                <th>Product Name</th>
                <th>Cost</th>
                <th>Quantity</th>
            </tr>
                <?php while($product=$result->fetch_assoc() ): ?>
                    <tr><td><?php echo $product['name'] ?> </td>
                    <td><?php echo $product['cost'] ?> </td>
                    <td><input type="number" class="quantity" name="quantities[<?php echo $product['p_id']; ?>]" data-price=<?php echo $product['cost']; ?> onInput="calculateTotal()"></tr>

                <?php endwhile; ?>




        </table>
        <h3>Order Summary</h3>
        <p>Subtotal: $<span id="total">0.00</span></p>
        <p>Tax: $<span id="tax">0.00</span></p>
        <p>Total: $<span id="sumtotal">0.00</span></p>
        <button type="submit">Proceed to checkout</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
