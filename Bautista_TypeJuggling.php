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
    <title>Type Juggling & Match - The Hamster Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Membership Tiers & Product Catalog</h1>
            <p class="page-subtitle">Customer Benefits and Product Listings</p>
        </div>

        <div class="content-box">
            <div class="section">
                <h2 class="section-title">Data Conversion Examples</h2>
                
                <h3 class="mt-2 mb-1" style="color: #8B4513;">String to Integer Conversion</h3>
                <?php
                    $stockInput = "25 units";
                    // TYPE CASTING (STRING TO INTEGER)
                    $stockInteger = (int)$stockInput;
                ?>
                <div class="info-item">
                    <strong>Original Input:</strong> "<?= $stockInput ?>" <span class="type-label">(string)</span>
                </div>
                <div class="info-item">
                    <strong>Converted Value:</strong> <?= $stockInteger ?> <span class="type-label">(integer)</span>
                </div>
                <div class="alert alert-info">
                    System automatically extracts numeric values from product descriptions for inventory counting.
                </div>

                <h3 class="mt-2 mb-1" style="color: #8B4513;">Float to Integer Conversion</h3>
                <?php
                    $priceFloat = 999.50;
                    // TYPE CASTING (FLOAT TO INTEGER)
                    $priceInteger = (int)$priceFloat;
                    $roundedPrice = round($priceFloat);
                ?>
                <div class="info-item">
                    <strong>Original Price:</strong> ₱<?= number_format($priceFloat, 2) ?> <span class="type-label">(float)</span>
                </div>
                <div class="info-item">
                    <strong>Truncated Price:</strong> ₱<?= $priceInteger ?> <span class="type-label">(integer)</span>
                </div>
                <div class="info-item">
                    <strong>Rounded Price:</strong> ₱<?= $roundedPrice ?> <span class="type-label">(integer)</span>
                </div>

                <h3 class="mt-2 mb-1" style="color: #8B4513;">Boolean Conversion</h3>
                <?php
                    $stockCount = 0;
                    // TYPE CASTING (INTEGER TO BOOLEAN)
                    $hasStock = (bool)$stockCount;
                    // TERNARY OPERATOR
                    $stockStatus = $hasStock ? "Available" : "Out of Stock";
                ?>
                <div class="info-item">
                    <strong>Stock Count:</strong> <?= $stockCount ?>
                </div>
                <div class="info-item">
                    <strong>Boolean Value:</strong> <?= $hasStock ? 'true' : 'false' ?>
                </div>
                <div class="info-item">
                    <strong>Status:</strong> <span class="<?= $hasStock ? 'success' : 'error' ?>"><?= $stockStatus ?></span>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Membership Tiers</h2>
                
                <?php
                    // ARRAY
                    $membershipLevels = array("Bronze", "Silver", "Gold", "Platinum");
                    
                    echo "<table class='data-table'>";
                    echo "<tr><th>Tier</th><th>Discount</th><th>Benefits</th></tr>";
                    
                    // FOREACH LOOP
                    foreach ($membershipLevels as $level) {
                        // MATCH EXPRESSION
                        $discount = match($level) {
                            "Bronze" => "5%",
                            "Silver" => "10%",
                            "Gold" => "15%",
                            "Platinum" => "20%",
                            default => "0%"
                        };
                        
                        // MATCH EXPRESSION
                        $benefits = match($level) {
                            "Bronze" => "Basic discounts",
                            "Silver" => "Priority support",
                            "Gold" => "Free shipping",
                            "Platinum" => "VIP exclusive access",
                            default => "None"
                        };
                        
                        echo "<tr>";
                        echo "<td><strong class='highlight'>$level</strong></td>";
                        echo "<td><span class='success'>$discount</span></td>";
                        echo "<td>$benefits</td>";
                        echo "</tr>";
                    }
                    
                    echo "</table>";
                ?>
            </div>

            <div class="section">
                <h2 class="section-title">Product Catalog</h2>
                
                <?php
                    // MULTI-DIMENSIONAL ARRAY
                    $products = array(
                        array("name" => "Deluxe Hamster Cage", "category" => "Housing", "price" => 4499.50, "rating" => 5),
                        array("name" => "Premium Pellets 2kg", "category" => "Food", "price" => 775.00, "rating" => 4),
                        array("name" => "Exercise Wheel Pro", "category" => "Toys", "price" => 1249.50, "rating" => 5),
                        array("name" => "Cozy Bedding Bundle", "category" => "Bedding", "price" => 637.50, "rating" => 4),
                        array("name" => "Vitamin Supplement Pack", "category" => "Health", "price" => 900.00, "rating" => 5)
                    );

                    echo "<table class='data-table'>";
                    echo "<tr><th>Product</th><th>Category</th><th>Price</th><th>Rating</th></tr>";
                    
                    // FOREACH LOOP
                    foreach ($products as $product) {
                        $stars = str_repeat("⭐", $product['rating']);
                        
                        echo "<tr>";
                        echo "<td><strong>{$product['name']}</strong></td>";
                        echo "<td>{$product['category']}</td>";
                        echo "<td class='price'>₱" . number_format($product['price'], 2) . "</td>";
                        echo "<td>$stars</td>";
                        echo "</tr>";
                    }
                    
                    echo "</table>";
                ?>

                <div class="alert alert-success mt-2">
                    <strong>Catalog Complete:</strong> Displaying <?= count($products) ?> products available.
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
