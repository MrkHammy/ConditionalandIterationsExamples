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
        <h1>Wombat Sticker Store </h1>
        <h2>Shopping Cart</h2>
        
        <div class="sticker-card">
            <h3 style="color:rgb(78, 141, 214); text-align: center; margin-bottom: 20px;">Your Selected Stickers</h3>
              <?php
            // DO WHILE, TO ADD STICKERS, ENSURES AT LEAST ONE ITERATION
            $cart = [];
            $stickerOptions = [
                '🌸 Cherry Blossom' => 49,
                '🦄 Unicorn Magic' => 49,
                '🐱 Kitty Cat' => 49,
                '🐹 Hamphter' => 49,
                '⭐ Sparkle Star' => 49
            ];
            
            $itemsToAdd = ['🌸 Cherry Blossom', '🦄 Unicorn Magic', '🐱 Kitty Cat'];
            $counter = 0;
            
            echo "<div class='info-text'>";
            echo "<p><strong>Adding items to your cart...</strong></p>";
            echo "</div>";
            
            // DO WHILE TO ENSURE AT LEAST ONE ITERATION
            do {
                if ($counter < count($itemsToAdd)) {
                    $itemName = $itemsToAdd[$counter];
                    $itemPrice = $stickerOptions[$itemName];
                    $cart[] = ['name' => $itemName, 'price' => $itemPrice];
                      echo "<div class='sticker-item'>";
                    echo "<span class='sticker-name'>✓ Added: {$itemName}</span>";
                    echo "<span class='sticker-price'>₱" . number_format($itemPrice, 2) . "</span>";
                    echo "</div>";
                }
                $counter++;
            } while ($counter < count($itemsToAdd));
            
            echo "<div class='promotion-box' style='margin-top: 20px;'>";
            echo "<h3>Want to Add More? </h3>";
            
            $moreItems = ['🐹 Hamphter', '⭐ Sparkle Star'];
            $i = 0;
            
            echo "<p><strong>Suggested items you might love:</strong></p>";
            
            do {
                $itemName = $moreItems[$i];
                $itemPrice = $stickerOptions[$itemName];
                  echo "<div class='sticker-item'>";
                echo "<span class='sticker-name'>{$itemName}</span>";
                echo "<span class='sticker-price'>₱" . number_format($itemPrice, 2) . "</span>";
                echo "</div>";
                
                $i++;
            } while ($i < count($moreItems));
            
            echo "</div>";
            
            $total = 0;
            $x = 0;
            do {
                $total += $cart[$x]['price'];
                $x++;
            } while ($x < count($cart));
              echo "<div class='freebie-box' style='margin-top: 20px;'>";
            echo "<h3>Cart Summary</h3>";
            echo "<p>Total Items: <strong>" . count($cart) . "</strong></p>";
            echo "<p>Subtotal: <strong style='color: #5ba3d0; font-size: 1.3em;'>₱" . number_format($total, 2) . "</strong></p>";
            echo "<p><small>Keep shopping to unlock free shipping at ₱200! </small></p>";
            echo "</div>";
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
