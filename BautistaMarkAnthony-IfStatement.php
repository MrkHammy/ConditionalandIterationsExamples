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
        <h2>Store Hours Check</h2>
        
        <div class="sticker-card">
            <?php
            // IF STATEMENT, THAT CHECKS IF STORE IS OPEN
            $currentDay = date('l'); // Gets current day name
            
            echo "<p class='info-text'>Today is: <span class='day-label'>$currentDay</span></p>";
            
            if ($currentDay == 'Saturday' || $currentDay == 'Sunday') {
                echo "<div class='store-status closed'>";
                echo "Sorry! We're Closed on Weekends";
                echo "<br><small>Come back on Monday! Or continue shopping online. </small>";
                echo "</div>";
            } else {
                echo "<div class='store-status open'>";
                echo "We're Open! Come Shop!";
                echo "<br><small>Open Monday - Friday, 9 AM - 6 PM </small>";
                echo "</div>";
            }
            
            // Additional if-else example
            $currentHour = date('G'); // Gets current hour (0-23)
            
            echo "<div class='promotion-box'>";
            echo "<h3>Special Hour Promotions</h3>";
            
            if ($currentHour >= 9 && $currentHour < 12) {
                echo "<p>☀️ <strong>Morning Rush!</strong> Get 10% off all cute animal stickers!</p>";
            } elseif ($currentHour >= 12 && $currentHour < 15) {
                echo "<p>🌤️ <strong>Lunch Break Special!</strong> Buy 2 Get 1 Free on emoji stickers!</p>";
            } elseif ($currentHour >= 15 && $currentHour < 18) {
                echo "<p>🌅 <strong>Afternoon Delight!</strong> Free shipping on orders over $20!</p>";
            } else {
                echo "<p>🌙 <strong>After Hours!</strong> Visit us during business hours for amazing deals!</p>";
            }
            echo "</div>";
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
