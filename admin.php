<?php
    include_once 'actions/connect.php';


    if(isset($_POST['enviar'])){
        $banner = $_FILES["banner"];
        $titulo_b = $_POST["titulo-banner"]; 
        $erros;
        if(!empty($banner["name"])){
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$banner["type"])){
                $erros[] = "isso não é uma imagem";
            }
        }
        if(count($erros)== 0){
            //Pega a extenção da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$banner["name"],$ext);
            //Gerar um nome unico
            $nome_banner = md5(uniqid(time())).".".$ext[1];

            $caminho_banner = "img/".$nome_banner;
            move_uploaded_file($banner["tmp_name"],$caminho_banner);

            $sql = "INSERT INTO banners (titulo, banner) VALUES ('$titulo_b','$nome_banner')";

            if(mysqli_query($connect,$sql)){
                header('location: admin.php');
            }else{
                echo 'ERRO';
            }
        }
    }

    include_once 'includes/header.php';
    
    
?>
    <section class="text-center">
        <h2>ADM</h2>
        <div>
            <h4>Adiconar</h4>
            <p>Selecione uma imagem de dimensões 3625 x 1171</p>
            <form action="admin.php" enctype="multipart/form-data" method="POST">
                <div>
                    <p>Nome do banner</p>
                    <input type="text" id="titulo-banner" name="titulo-banner">
                </div><br>
                <input type="file" id="banner" name="banner" accept="image/png, image/jpeg"><br> 
                <br><button type="submit" class="" id="enviar" name="enviar">Adicionar</button><br>
            </form>
        </div>

        <div>
        <div class="text-center">
        <h2>Banners</h2>
        <div class="row justify-content-md-center">
            <table class="table table-striped col-6">    
                <!--CABEÇALHO-->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">banner:</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <!--CORPO-->
                <tbody>
                    <?php
                        //SELECIONA TODOS OS DADOS DA TABELA 
                        $sql = "SELECT * FROM banners";
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
                        <td ><?php echo $dados['titulo'];?></td>
                        <td><?php echo $dados['banner'];?></td>
                        <form action="actions/delete.php" method="POST">
                            <td><button type="submit" class="btn btn-danger" id="excluir" name="excluir">Excluir</button></td>
                            <input type="hidden" id="id_b" name="id_b" value="<?php echo $dados['id']?>">
                            <input type="hidden" id="caminho" name="caminho" value="<?php echo $dados['banner']?>">
                        </form>
                        
                    </tr>
                    <?php 
                            endwhile;
                        endif;
                    ?>
                    
                </tbody>
                
            </table>
        </div>
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