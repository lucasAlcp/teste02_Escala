<?php

    if(isset($_POST['enviar'])){
        $banner = $_FILES["banner"];

        if(!empty($banner["name"])){
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$banner["type"])){
                $erros[] = "isso não é uma imagem";
            }
        }
        //if(count($erros)== 0){
            //Pega a extenção da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$banner["name"],$ext);

            $caminho_banner = "img/banner.jpg";
            move_uploaded_file($banner["tmp_name"],$caminho_banner);
       // }
    }

    include_once 'includes/header.php';
    include_once 'actions/connect.php';
    
?>
    <section class="text-center">
        <h2>ADM</h2>
        <div>
            <h4>Trocar o Banner</h4>
            <p>Selecione uma imagem de dimensões 3625 x 1171</p>
            <form action="admin.php" enctype="multipart/form-data" method="POST">
                <input type="file" id="banner" name="banner" accept="image/png, image/jpeg"><br> 
                <button type="submit" class="" id="enviar" name="enviar">Trocar</button>
            </form>
        </div>

        <div class="text-center">
        <h2>Lista de contatos</h2>
        <div class="row justify-content-md-center">
            <table class="table table-striped col-6">    
                <!--CABEÇALHO-->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">Email:</th>
                        <th scope="col">Telefone:</th>
                    </tr>
                </thead>

                <!--CORPO-->
                <tbody>
                    <?php
                        //SELECIONA TODOS OS DADOS DA TABELA 
                        $sql = "SELECT * FROM Contatos";
                        $resultado = mysqli_query($connect, $sql);
                            
                        if(mysqli_num_rows($resultado)<1):
                    ?>
                    <tr>
                        <td scope="row">--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                    </tr>
                    <?php
                        else:
                            //GUARDA OS DADOS EM UM ARRAY E EXIBE NO LOOP 
                            while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dados['id'];?></td>
                        <td ><?php echo $dados['nome'];?></td>
                        <td><?php echo $dados['email'];?></td>
                        <td><?php echo $dados['telefone'];?></td>
                    </tr>
                    <?php 
                            endwhile;
                        endif;
                    ?>
                    
                </tbody>
                
            </table>
        </div>
    </section>

<?php
    include_once 'includes/footer.php';
?>