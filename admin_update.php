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

    <title>atualização do administrador</title>
</head>
<body>
<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="mensagem">'.$message.'</span>';
    }
}

?>

    <div class="container">
        <div class="admin-product-form-container centered">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>Adicionar um novo produto</h3>
                <input type="text" placeholder="Digite o nome do produto" name="product_name" class="box">
                <input type="number" placeholder="Digite o preço" name="product_price" class="box">
                <input type="file" acept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="update_product" value="atualizar produto">
            </form>            
        </div>
    </div>
</body>
</html>
