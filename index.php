<?php
// Příprava na session a cookies 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kdestosehnal</title>
    <link rel="stylesheet" href="./php/nav/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Convergence&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./php/index/style.css"> -->
    <!-- favicon -->
</head>
<body class="container">
    <!-- header -->
    <?php include "./php/nav/index.php"; ?>
    <!-- special offer -->
    <main class="special-offer-container">
        <h2 class="special-offer-headline">Nabídka, která se neodmíta!</h2>
        <div class='special-offer-content'>
            <?php include "./php/index/specialni_nabidka.php"; ?>
        </div>
    </main>
    <!-- main nabídka -->
    <?php include "./php/index/nabidka.php"; ?>
    <!-- footer -->
</body>
</html>
