<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menu prices
    $menu = [
        'Sisig' => 100,
        'Pakbet' => 60,
        'Adobo' => 80
    ];

    // Get selected order, quantity, and cash
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];


    $totalPrice = $menu[$order] * $quantity;


    if ($cash >= $totalPrice) {
        $change = $cash - $totalPrice;
        $message = "<div style='font-size: 24px; font-weight: bold;'>
                        <p>Total Price: PHP $totalPrice</p>
                        <p>Amount Paid: PHP $cash</p>
                        <p>Change: PHP $change</p>
                        <p>" . date('h:i a M d, Y') . "</p>
                    </div>";
    } else {
        $message = "<div style='font-size: 24px; font-weight: bold; color: red;'>
                        <p>SORRY, YOUR BALANCE IS NOT ENOUGH</p>
                    </div>";
    }
    $showMenu = false;
} else {
    $showMenu = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
</head>
<body>
    <?php if ($showMenu): ?>
        <h2>Menu</h2>
        <table border="1">
            <tr>
                <th>Order</th>
                <th>Price (PHP)</th>
            </tr>
            <tr>
                <td>Sisig</td>
                <td>100</td>
            </tr>
            <tr>
                <td>Pakbet</td>
                <td>60</td>
            </tr>
            <tr>
                <td>Adobo</td>
                <td>80</td>
            </tr>
        </table>

        <br><br>

        <form method="POST" action="">
            <label for="order">Select an order:</label>
            <select id="order" name="order">
                <option value="Sisig">Sisig - PHP 100</option>
                <option value="Pakbet">Pakbet - PHP 60</option>
                <option value="Adobo">Adobo - PHP 80</option>
            </select>
            <br><br>

            <label for="quantity">Select quantity:</label>
            <select id="quantity" name="quantity">
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <br><br>

            <label for="cash">Cash:</label>
            <input type="number" id="cash" name="cash" min="0" required>
            <br><br>

            <button type="submit" name="pay">Pay</button>
        </form>
    <?php endif; ?>

    <br><br>

    <?php

    if (isset($message)) {
        echo $message;
    }
    ?>
</body>
</html>
