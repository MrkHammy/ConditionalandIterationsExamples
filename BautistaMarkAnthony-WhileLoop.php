<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticker Store</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="container">
        <h1>Wombat Sticker Store</h1>
        <h2>Sticker Price List</h2>
        
        <div class="sticker-card">
            <h3 style="color: rgb(78, 141, 214); text-align: center; margin-bottom: 20px;">Our Sticker Collection</h3>
              <?php
            // WHILE LOOP THAT DISPLAYS THE STICKER PRICES
            $stickers = [
                ['name' => '🌸 Cherry Blossom Pack', 'price' => 49],
                ['name' => '🦄 Unicorn Dreams Set', 'price' => 49],
                ['name' => '🐱 Cute Cats Collection', 'price' => 49],
                ['name' => '🌈 Rainbow Vibes Pack', 'price' => 49],
                ['name' => '⭐ Sparkle Stars Bundle', 'price' => 49],
                ['name' => '💕 Love & Hearts Set', 'price' => 49],
                ['name' => '🍓 Fruity Fun Pack', 'price' => 49],
                ['name' => '🎀 Kawaii Ribbon Collection', 'price' => 49]
            ];
            
            $index = 0;
            $totalItems = count($stickers);
            
            while ($index < $totalItems) {
                $sticker = $stickers[$index];
                echo "<div class='sticker-item'>";
                echo "<span class='sticker-name'>{$sticker['name']}</span>";
                echo "<span class='sticker-price'>₱" . number_format($sticker['price'], 2) . "</span>";
                echo "</div>";
                $index++;
            }
            
            // CALCULATE TOTAL (CONCEPT LEARNED FROM MODULE 1)
            $totalPrice = 0;
            $i = 0;
            while ($i < $totalItems) {
                $totalPrice += $stickers[$i]['price'];
                $i++;
            }
            
            echo "<div class='promotion-box' style='margin-top: 30px;'>";
            echo "<h3>Bundle Deal</h3>";
            echo "<p>Buy ALL sticker packs for only: <strong style='color: #5ba3d0; font-size: 1.3em;'>₱" . number_format($totalPrice * 0.85, 2) . "</strong></p>";
            echo "<p><small>(Regular price: ₱" . number_format($totalPrice, 2) . " - Save 15%!)</small></p>";
            echo "</div>";
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
