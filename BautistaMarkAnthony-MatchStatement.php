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
        <h2>Daily Freebies</h2>
        
        <div class="sticker-card">
            <?php
            // MATCH EXPRESSION
            $dayOfWeek = date('l');
            
            echo "<p class='info-text'>Today is: <span class='day-label'>$dayOfWeek</span></p>";
            
            echo "<div class='freebie-box'>";
            echo "<h3>Today's FREE Freebie </h3>";
            
            // MATCH EXPRESSION
            $freebie = match($dayOfWeek) {
                'Monday' => "🌟 Free Sun!",
                'Tuesday' => "🦄 Free Unicorn!",
                'Wednesday' => "🐱 Free Cute Kitten!",
                'Thursday' => "🌸 Free Flower!",
                'Friday' => "🎉 Free Party Sticker!",
                'Saturday' => "🌈 Free Rainbow Sticker!",
                'Sunday' => "💕 Free Heart Sticker!",
                default => "✨ Free mystery sticker!"
            };
            
            echo "<p>$freebie</p>";
            echo "</div>";
            
            // Additional match example - Freebie based on purchase amount
            $purchaseAmount = 35; // Example amount
            
            echo "<div class='promotion-box'>";
            echo "<h3>Purchase Bonus Freebies</h3>";
            echo "<p class='info-text'>Current cart total: <span class='highlight'>\$$purchaseAmount</span></p>";
            
            $bonusFreebie = match(true) {
                $purchaseAmount >= 50 => "WOW! Get a MEGA sticker pack (30+ stickers)!",
                $purchaseAmount >= 30 => "Great! Get a premium sticker pack (15 stickers)!",
                $purchaseAmount >= 20 => "Nice! Get a mini sticker pack (8 stickers)!",
                $purchaseAmount >= 10 => "Get 3 random cute stickers!",
                default => "🌟 Get 1 free sticker with any purchase!"
            };
            
            echo "<p>$bonusFreebie</p>";
            echo "</div>";
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
