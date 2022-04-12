
<?php

@include 'config.php';

$id = $_GET['id'];

if(isset($_POST['update_product'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_image)){

        $message[] = 'Por favor preencha todos os campos';
    }else{
        $update = "UPDATE produtos SET name='$product_name', price='$product_price', image='$product_image' WHERE id=$id";
        $upload = mysqli_query($conn,$update);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
        }else{
            $message[] = 'não foi possível adicionar o produto';
        }
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
            <?php
                $select = mysqli_query($conn,"SELECT * FROM produtos WHERE id = $id")
                while($row = mysqli_fetch_assoc($select)){
            ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>Atualize o produto</h3>
                <input type="text" placeholder="Digite o nome do produto" value="<?php $row['name']; ?>" name="product_name" class="box">
                <input type="number" placeholder="Digite o preço" value="<?php $row['price']; ?>" name="product_price" class="box">
                <input type="file" acept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="update_product" value="Atualizar produto">
                <a href="admin_page.php" class="btn">Voltar</a>
            </form>
            <?php };?>          
        </div>
    </div>
</body>
</html>
