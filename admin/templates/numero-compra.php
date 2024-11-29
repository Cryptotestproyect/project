

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
carrito(<?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)
</body>
</html>