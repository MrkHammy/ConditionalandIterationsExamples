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
    <title>Multi-Array & Do-While - The Hamster Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Hamster Inventory Management</h1>
            <p class="page-subtitle">Product Categories and Daily Stock Check</p>
        </div>

        <div class="content-box">
            <div class="section">
                <h2 class="section-title">Hamster Product Categories</h2>
                
                <?php
                    // MULTI-DIMENSIONAL ARRAY
                    $productCategories = array(
                        "Food & Nutrition" => array("Premium Pellets", "Seed Mix", "Treats", "Vegetables"),
                        "Housing & Bedding" => array("Cage", "Bedding", "Hideout", "Exercise Wheel"),
                        "Health & Care" => array("Vitamin Supplements", "Grooming Kit", "First Aid"),
                        "Toys & Entertainment" => array("Chew Toys", "Tunnels", "Exercise Ball", "Climbing Frame")
                    );

                    // FOREACH LOOP (NESTED)
                    foreach($productCategories as $category => $products) {
                        echo "<div class='info-item'>";
                        echo "<strong class='highlight'>$category:</strong><br>";
                        echo "<ul style='margin-left: 20px; margin-top: 10px;'>";
                        foreach($products as $product) {
                            echo "<li>$product</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                    }
                ?>
            </div>

            <div class="section">
                <h2 class="section-title">Daily Stock Check</h2>
                
                <?php
                    // MULTI-DIMENSIONAL ARRAY
                    $hamsterStock = array(
                        array("name" => "Fluffy", "type" => "Syrian Hamster", "price" => 750, "available" => true),
                        array("name" => "Nibbles", "type" => "Dwarf Hamster", "price" => 600, "available" => true),
                        array("name" => "Whiskers", "type" => "Roborovski Hamster", "price" => 500, "available" => false),
                        array("name" => "Squeaky", "type" => "Chinese Hamster", "price" => 650, "available" => true),
                        array("name" => "Patches", "type" => "Syrian Hamster", "price" => 750, "available" => true)
                    );

                    echo "<table class='data-table'>";
                    echo "<tr><th>Name</th><th>Type</th><th>Price</th><th>Status</th></tr>";
                    
                    // DO-WHILE LOOP
                    $i = 0;
                    do {
                        $hamster = $hamsterStock[$i];
                        // TERNARY OPERATOR
                        $status = $hamster['available'] ? "<span class='success'>Available</span>" : "<span class='error'>Sold Out</span>";
                        echo "<tr>";
                        echo "<td><strong>{$hamster['name']}</strong></td>";
                        echo "<td>{$hamster['type']}</td>";
                        echo "<td class='price'>₱" . number_format($hamster['price'], 2) . "</td>";
                        echo "<td>$status</td>";
                        echo "</tr>";
                        $i++;
                    } while ($i < count($hamsterStock));
                    
                    echo "</table>";
                ?>

                <div class="alert alert-info mt-2">
                    <strong>Stock Summary:</strong> We have checked <?php echo count($hamsterStock); ?> hamsters in our current inventory.
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
