<?php

@include 'config.php';

isset($_POST['add_product']){

    $product_name = $_POST['add_product'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--custom css file link-->
    <link rel="stylesheet" href="css/estilo.css">

    <title>Página de administração</title>
</head>
<body>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>Adicionar um novo produto</h3>
                <input type="text" placeholder="Digite o nome do produto" name="product_name" class="box">
                <input type="number" placeholder="Digite o preço" name="product_price" class="box">
                <input type="file" acept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="adicionar produto">
            </form>
        </div>
    </div>
</body>
</html>
