<?php
/*
 * Bautista, Mark Anthony A.
 * 2091-6DWEB | CYB-201
 * PRLM Assign 2
 * November 29, 2025
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operators & If-While - The Hamster Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Shopping Cart System</h1>
            <p class="page-subtitle">Order Processing and Stock Management</p>
        </div>

        <div class="content-box">
            <div class="section">
                <h2 class="section-title">Shopping Cart Calculation</h2>
                
                <?php
                    // VARIABLES
                    $itemName = "Hamster Starter Kit";
                    $itemPrice = 2299.50;
                    $quantity = 3;
                    $stock = 10;
                    $discount = 0.10;
                    
                    // ARITHMETIC OPERATORS
                    $subtotal = $itemPrice * $quantity;
                    $discountAmount = $subtotal * $discount;
                    $total = $subtotal - $discountAmount;
                    $remainingStock = $stock - $quantity;
                ?>

                <div class="info-item">
                    <strong>Product:</strong> <?= $itemName ?>
                </div>
                <div class="info-item">
                    <strong>Unit Price:</strong> <span class="price">₱<?= number_format($itemPrice, 2) ?></span>
                </div>
                <div class="info-item">
                    <strong>Quantity:</strong> <?= $quantity ?>
                </div>
                <div class="info-item">
                    <strong>Subtotal:</strong> <span class="price">₱<?= number_format($subtotal, 2) ?></span>
                </div>
                <div class="info-item">
                    <strong>Discount (10%):</strong> <span class="success">-₱<?= number_format($discountAmount, 2) ?></span>
                </div>
                <div class="info-item">
                    <strong>Total:</strong> <span class="price">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="info-item">
                    <strong>Remaining Stock:</strong> <?= $remainingStock ?> units
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Stock Validation</h2>
                
                <?php
                    $requestedQuantity = 3;
                    $availableStock = 10;
                    $minimumOrder = 1;
                    $maximumOrder = 5;

                    // IF-ELSEIF-ELSE STATEMENT (COMPARISON OPERATORS)
                    if ($requestedQuantity < $minimumOrder) {
                        echo "<div class='alert alert-warning'>";
                        echo "<strong>Warning:</strong> Minimum order quantity is $minimumOrder item(s).";
                        echo "</div>";
                    } elseif ($requestedQuantity > $maximumOrder) {
                        echo "<div class='alert alert-warning'>";
                        echo "<strong>Warning:</strong> Maximum order quantity is $maximumOrder items per customer.";
                        echo "</div>";
                    } elseif ($requestedQuantity > $availableStock) {
                        echo "<div class='alert alert-error'>";
                        echo "<strong>Error:</strong> Insufficient stock. Only $availableStock items available.";
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Success:</strong> Your order of $requestedQuantity items has been validated!";
                        echo "</div>";
                    }
                ?>
            </div>

            <div class="section">
                <h2 class="section-title">Processing Orders</h2>
                
                <?php
                    // MULTI-DIMENSIONAL ARRAY
                    $orders = array(
                        array("id" => 1001, "customer" => "Alice", "amount" => 2275.00),
                        array("id" => 1002, "customer" => "Bob", "amount" => 1600.00),
                        array("id" => 1003, "customer" => "Charlie", "amount" => 3912.50),
                        array("id" => 1004, "customer" => "Diana", "amount" => 2840.00),
                        array("id" => 1005, "customer" => "Edward", "amount" => 1199.50)
                    );

                    echo "<table class='data-table'>";
                    echo "<tr><th>Order ID</th><th>Customer</th><th>Amount</th><th>Status</th></tr>";
                    
                    $index = 0;
                    $totalRevenue = 0;
                    
                    // WHILE LOOP
                    while ($index < count($orders)) {
                        $order = $orders[$index];
                        // COMPOUND ASSIGNMENT OPERATOR
                        $totalRevenue += $order['amount'];
                        
                        echo "<tr>";
                        echo "<td>#{$order['id']}</td>";
                        echo "<td>{$order['customer']}</td>";
                        echo "<td class='price'>₱" . number_format($order['amount'], 2) . "</td>";
                        echo "<td><span class='success'>Processed</span></td>";
                        echo "</tr>";
                        
                        // INCREMENT OPERATOR
                        $index++;
                    }
                    
                    echo "</table>";
                ?>

                <div class="alert alert-success mt-2">
                    <strong>Total Orders Processed:</strong> <?= count($orders) ?> orders<br>
                    <strong>Total Revenue:</strong> <span class="price">₱<?= number_format($totalRevenue, 2) ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
