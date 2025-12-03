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
    <title>Shorthand Echo & If-Else - The Hamster Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Shipping Calculator & Customer Info</h1>
            <p class="page-subtitle">Delivery Estimates and Product Availability</p>
        </div>

        <div class="content-box">
            <div class="section">
                <h2 class="section-title">Customer Preferences</h2>
                
                <?php
                    // VARIABLES
                    $customerName = "Iviana";
                    $favoriteHamster = "Dwarf Hamster";
                    $preferredFood = "Premium Seed Mix";
                    $memberSince = "2024";
                    $isPremiumMember = true;
                ?>

                <!-- SHORTHAND ECHO -->
                <div class="info-item">
                    <strong>Customer Name:</strong> <?= $customerName ?>
                </div>
                <div class="info-item">
                    <strong>Favorite Hamster Type:</strong> <span class="highlight"><?= $favoriteHamster ?></span>
                </div>
                <div class="info-item">
                    <strong>Preferred Food:</strong> <?= $preferredFood ?>
                </div>
                <div class="info-item">
                    <strong>Member Since:</strong> <?= $memberSince ?>
                </div>
                <!-- SHORTHAND ECHO WITH TERNARY OPERATOR -->
                <div class="info-item">
                    <strong>Membership Status:</strong> 
                    <span class="<?= $isPremiumMember ? 'success' : 'warning' ?>">
                        <?= $isPremiumMember ? 'Premium Member' : 'Regular Member' ?>
                    </span>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Product Availability</h2>
                
                <?php
                    // MULTI-DIMENSIONAL ARRAY
                    $products = array(
                        array("name" => "Hamster Wheel", "stock" => 15, "reorderLevel" => 10),
                        array("name" => "Food Pellets", "stock" => 5, "reorderLevel" => 10),
                        array("name" => "Water Bottle", "stock" => 0, "reorderLevel" => 5),
                        array("name" => "Chew Toys", "stock" => 25, "reorderLevel" => 10)
                    );

                    // FOREACH LOOP
                    foreach ($products as $product) {
                        echo "<div class='info-item'>";
                        echo "<strong>{$product['name']}</strong> - Stock: {$product['stock']} units<br>";
                        
                        // IF-ELSEIF-ELSE STATEMENT (COMPARISON OPERATORS)
                        if ($product['stock'] == 0) {
                            echo "<span class='error'>Status: OUT OF STOCK - Order immediately!</span>";
                        } elseif ($product['stock'] < $product['reorderLevel']) {
                            echo "<span class='warning'>Status: LOW STOCK - Reorder recommended</span>";
                        } else {
                            echo "<span class='success'>Status: IN STOCK - Adequate supply</span>";
                        }
                        
                        echo "</div>";
                    }
                ?>
            </div>

            <div class="section">
                <h2 class="section-title">Shipping Calculator</h2>
                
                <?php
                    $orderAmount = 3775.00;
                    $customerLocation = "Metro Manila";
                    $shippingFee = 0;
                    $estimatedDays = 0;

                    // NESTED IF-ELSE STATEMENT
                    if ($orderAmount >= 5000) {
                        $shippingFee = 0;
                        $estimatedDays = 2;
                        $shippingMessage = "FREE SHIPPING on orders over ₱5,000!";
                        $alertClass = "alert-success";
                    } else {
                        // NESTED IF-ELSEIF-ELSE (COMPARISON OPERATORS)
                        if ($customerLocation == "Metro Manila") {
                            $shippingFee = 50;
                            $estimatedDays = 1;
                        } elseif ($customerLocation == "Luzon") {
                            $shippingFee = 100;
                            $estimatedDays = 3;
                        } elseif ($customerLocation == "Visayas") {
                            $shippingFee = 150;
                            $estimatedDays = 5;
                        } else {
                            $shippingFee = 200;
                            $estimatedDays = 7;
                        }

                        $shippingMessage = "Shipping fee: ₱" . number_format($shippingFee, 2);
                        $alertClass = "alert-info";
                    }
                ?>

                <!-- SHORTHAND ECHO -->
                <div class="info-item">
                    <strong>Order Amount:</strong> <span class="price">₱<?= number_format($orderAmount, 2) ?></span>
                </div>
                <div class="info-item">
                    <strong>Location:</strong> <?= $customerLocation ?>
                </div>
                <!-- SHORTHAND ECHO WITH TERNARY OPERATOR -->
                <div class="info-item">
                    <strong>Shipping Fee:</strong> <?= $shippingFee == 0 ? '<span class="success">FREE</span>' : '<span class="price">₱' . number_format($shippingFee, 2) . '</span>' ?>
                </div>
                <div class="info-item">
                    <strong>Estimated Delivery:</strong> <?= $estimatedDays ?> business days
                </div>

                <div class="alert <?= $alertClass ?> mt-2">
                    <?= $shippingMessage ?>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Quick Product Info</h2>
                
                <?php
                    $age = 8;
     
                    $isAdult = ($age >= 18) ? "Adult" : "Minor";
                    
                    $temperature = 28;
     
                    $hamsterComfort = ($temperature >= 20 && $temperature <= 26) ? "Optimal" : "Adjust Temperature";
                    
                    $cageSize = "Large";

                    $suitableFor = ($cageSize == "Large") ? "Syrian Hamster" : "Dwarf Hamster";
                ?>

                <!-- SHORTHAND ECHO -->
                <div class="info-item">
                    <strong>Customer Age:</strong> <?= $age ?> years old - 
                    <span class="<?= $isAdult == 'Adult' ? 'success' : 'warning' ?>"><?= $isAdult ?></span>
                </div>
                <div class="info-item">
                    <strong>Room Temperature:</strong> <?= $temperature ?>°C - 
                    <span class="<?= $hamsterComfort == 'Optimal' ? 'success' : 'warning' ?>"><?= $hamsterComfort ?></span>
                </div>
                <div class="info-item">
                    <strong>Cage Size:</strong> <?= $cageSize ?> - 
                    <span class="highlight">Best for: <?= $suitableFor ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
