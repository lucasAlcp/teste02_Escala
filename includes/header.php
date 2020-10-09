
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Imobiliaria Viva Bem</title>
</head>
<body style="transition: 1s;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            
            <a class="navbar-brand" href="index.php">Viva Bem</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#sobre">Sobre nós</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#imoveis">Imóveis</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#contato">Contato</a></li>
                </ul>
            </div>
    </nav>
    <div>
    <?php
        include_once 'actions/connect.php';
        //SELECIONA TODOS OS DADOS DA TABELA 
        $sql = "SELECT * FROM banners";
        $resultado = mysqli_query($connect, $sql);
        $cont = 0;
            
        if(mysqli_num_rows($resultado)>=1):
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php
                 //GUARDA OS DADOS EM UM ARRAY E EXIBE NO LOOP 
                while($dados = mysqli_fetch_array($resultado)):
                if($cont == 0){
            ?>
                <div class="carousel-item active">
                    <img src="img/<?php echo $dados['banner']?>" class="d-block w-100" alt="...">
                </div>
            <?php
                }
                else{
                ?>
                <div class="carousel-item ">
                    <img src="img/<?php echo $dados['banner']?>" class="d-block w-100" alt="...">
                </div>
                <?php
                }
                $cont++;
                endwhile;
            ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php
        endif;
    ?>
    </div>