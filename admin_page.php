<?php

@include 'config.php';

if(isset($_POST['add_product'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_image)){

        $message[] = 'Por favor preencha todos os campos';
    }else{
        $insert = "INSERT INTO produtos(name, price, image) VALUES('$product_name','$product_price','$product_image')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'Produto adicionado sucesso';
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

    <title>Página de administração</title>
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
        <div class="admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>Adicionar um novo produto</h3>
                <input type="text" placeholder="Digite o nome do produto" name="product_name" class="box">
                <input type="number" placeholder="Digite o preço" name="product_price" class="box">
                <input type="file" acept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="adicionar produto">
            </form>            
        </div>

        <?php
            $select = mysqli_query($conn, "SELECT * FROM produtos");
        ?>

        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Imagem do Produto</th>
                        <th>Nome do produto</th>
                        <th>Preço do produto</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <?php
                    while($row = mysqli_fetch_assoc($select)){
                ?>
                <tr>
                    <td><img src="uploaded_img/<?php $row['image']; ?>" height="100" alt=""></td>
                    <td><?php $row['name']; ?></td>
                    <td><?php $row['price']; ?></td>
                    <th>Ação</th>
                </tr>
                <?php }; ?>
            </table>
        </div>
    </div>

</body>
</html>
