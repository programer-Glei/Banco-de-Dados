<?php

@include 'config.php';

if(isset($_POST['add_product'])){

    $product_name = $_POST['add_name'];
    $product_price = $_POST['add_price'];
    $product_image = $_POST['add_image']['name'];
    $product_image_tmp_name = $_POST['add_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_image)){

        $message[] = 'por favor preencha todos';
    }
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
    <?php

    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }

    ?>
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
