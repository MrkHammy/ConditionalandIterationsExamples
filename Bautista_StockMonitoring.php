<?php
/*
 * Bautista, Mark Anthony A.
 * 2091-6DWEB | CYB-201
 * PRLM Assign 2
 * December 3, 2025
 */

// STRICT TYPES
declare(strict_types = 1);

// GLOBAL VARIABLE - TAX RATE
$tax_rate = 12;

// FUNCTION - GET REORDER MESSAGE
function get_reorder_message(int $stock): string {
    // TERNARY OPERATOR
    return ($stock < 10) ? 'Yes' : 'No';
}

// FUNCTION - GET TOTAL VALUE
function get_total_value(float $price, int $quantity): float {
    // MULTIPLICATION OPERATOR
    return $price * $quantity;
}

// FUNCTION - GET TAX DUE
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float {
    // ARITHMETIC OPERATORS
    return ($price * $quantity) * ($tax_rate / 100);
}

// MULTI-DIMENSIONAL ASSOCIATIVE ARRAY
$hamster_products = [
    'Premium Hamster Pellets 5kg' => ['price' => 1250.00, 'stock' => 15],
    'Deluxe Hamster Cage' => ['price' => 4499.50, 'stock' => 5],
    'Exercise Wheel Pro' => ['price' => 1249.50, 'stock' => 8],
    'Cozy Bedding Bundle' => ['price' => 637.50, 'stock' => 3],
    'Vitamin Supplement Pack' => ['price' => 900.00, 'stock' => 12],
    'Hamster Chew Toys Set' => ['price' => 450.00, 'stock' => 20],
    'Water Bottle Premium' => ['price' => 350.00, 'stock' => 7],
    'Hamster Tunnel System' => ['price' => 1800.00, 'stock' => 4],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Monitoring - The Hamster Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Stock Monitoring System</h1>
            <p class="page-subtitle">Inventory Levels and Tax Calculation</p>
        </div>

        <div class="content-box">
            <div class="section">
                <h2 class="section-title">Current Stock Status</h2>
                
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Stock Level</th>
                            <th>Re-order?</th>
                            <th>Total Value</th>
                            <th>Tax Due (<?= $tax_rate ?>%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // FOREACH LOOP
                        foreach ($hamster_products as $product_name => $data) {
                            echo "<tr>";
                            
                            // PRODUCT NAME
                            echo "<td><strong>$product_name</strong></td>";
                            
                            // STOCK LEVEL
                            echo "<td>{$data['stock']} units</td>";
                            
                            // FUNCTION CALL - GET REORDER MESSAGE
                            $reorder = get_reorder_message($data['stock']);
                            $reorder_class = ($reorder == 'Yes') ? 'warning' : 'success';
                            echo "<td><span class='$reorder_class'>$reorder</span></td>";
                            
                            // FUNCTION CALL - GET TOTAL VALUE
                            $total_value = get_total_value($data['price'], $data['stock']);
                            echo "<td class='price'>₱" . number_format($total_value, 2) . "</td>";
                            
                            // FUNCTION CALL - GET TAX DUE
                            $tax_due = get_tax_due($data['price'], $data['stock'], $tax_rate);
                            echo "<td class='price'>₱" . number_format($tax_due, 2) . "</td>";
                            
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div class="alert alert-info mt-2">
                    <strong>Tax Rate:</strong> <?= $tax_rate ?>% VAT applied to all products<br>
                    <strong>Reorder Threshold:</strong> Products with stock below 10 units should be reordered
                </div>

                <?php
                // CALCULATE SUMMARY STATISTICS
                $total_inventory_value = 0;
                $total_tax_due = 0;
                $products_needing_reorder = 0;
                
                // FOREACH LOOP FOR CALCULATIONS
                foreach ($hamster_products as $product_name => $data) {
                    $total_inventory_value += get_total_value($data['price'], $data['stock']);
                    $total_tax_due += get_tax_due($data['price'], $data['stock'], $tax_rate);
                    
                    // IF STATEMENT
                    if ($data['stock'] < 10) {
                        $products_needing_reorder++;
                    }
                }
                ?>

                <div class="alert alert-success mt-2">
                    <strong>Inventory Summary:</strong><br>
                    <strong>Total Products:</strong> <?= count($hamster_products) ?> items<br>
                    <strong>Total Inventory Value:</strong> <span class="price">₱<?= number_format($total_inventory_value, 2) ?></span><br>
                    <strong>Total Tax Due on Sale:</strong> <span class="price">₱<?= number_format($total_tax_due, 2) ?></span><br>
                    <strong>Products Needing Reorder:</strong> <span class="<?= $products_needing_reorder > 0 ? 'warning' : 'success' ?>"><?= $products_needing_reorder ?> items</span>
                </div>
            </div>
        </div>
        </div>
        </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
