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
        <h2>Daily Promotions</h2>
        
        <div class="sticker-card">
            <?php
            // SWITCH STATEMENT FOR DIFFERENT PROMOTIONS OF THE DAY
            $dayOfWeek = date('l');
            
            echo "<p class='info-text'>Today is: <span class='day-label'>$dayOfWeek</span></p>";
            
            echo "<div class='promotion-box'>";
            echo "<h3>Today's Special Promotion</h3>";
            
            switch ($dayOfWeek) {
                case 'Monday':
                    echo "<p class='emoji'>🌟</p>";
                    echo "<p><strong>Monday Deals!</strong></p>";
                    echo "<p>Sticker packs 25% OFF!</p>";
                    break;
                    
                case 'Tuesday':
                    echo "<p class='emoji'>🦄</p>";
                    echo "<p><strong>Tuesday Deals!</strong></p>";
                    echo "<p>Sticker packs 15% OFF!</p>";
                    break;
                    
                case 'Wednesday':
                    echo "<p class='emoji'>🐱</p>";
                    echo "<p><strong>Wednesday Deals!</strong></p>";
                    echo "<p>Sticker packs 10% OFF!</p>";
                    break;
                    
                case 'Thursday':
                    echo "<p class='emoji'>🌸</p>";
                    echo "<p><strong>Thursday Deals!</strong></p>";
                    echo "<p>Sticker packs 30% OFF!</p>";
                    break;
                    
                case 'Friday':
                    echo "<p class='emoji'>🎉</p>";
                    echo "<p><strong>Friday Deals!</strong></p>";
                    echo "<p>Sticker packs 15% OFF!</p>";
                    break;
                    
                case 'Saturday':
                    echo "<p class='emoji'>🌈</p>";
                    echo "<p><strong>Saturday Deals!</strong></p>";
                    echo "<p>Sticker packs 55% OFF!</p>";
                    break;
                    
                case 'Sunday':
                    echo "<p class='emoji'>💤</p>";
                    echo "<p><strong>Sunday Deals!</strong></p>";
                    echo "<p>FREE STICKER WHEN  ORDERING ₱100+ </p>";
                    break;
                    
                default:
                    echo "<p>Check back soon for amazing deals!</p>";
                    break;
            }
            
            echo "</div>";
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
