<?php
    include_once 'includes/header.php';
?>
    <div class="containner">
        
        <section id="imoveis" class="containner m-3 p-3">
                <div class="text-center">
                    <h2>Imoveis</h2>
                </div>
                <div class="row">
                    <div class=" col-md-3 offset-md-3 text-center">
                        <h4 class="">Imovel</h4>
                        <img src="img/01.jpg"class="img-thumbnail" alt="">
                        <p>Descrição</p>
                    </div>
                    <div class=" col-3  text-center">
                        <h4>Imovel</h4>
                        <img src="img/02.jpg"class="img-thumbnail" alt="">
                        <p>Descrição</p>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-3 offset-md-3 p-3 text-center">
                        <h4>Imovel</h4>
                        <img src="img/03.jpg"class="img-thumbnail" alt="">
                        <p>Descrição</p>
                    </div>
                    <div class=" col-3  text-center">
                        <h4>Imovel</h4>
                        <img src="img/04.jpg"class="img-thumbnail" alt="">
                        <p>Descrição</p>
                    </div>
                </div>
        </section>

        <div id="sobre" class="text-center text-wrap mt-3 mb-3 p-3 bg-dark text-light ">
            <h2>Sobre nós</h2>
            <p>Mais que uma imobiliaria, somos uma fabrica de realizar sonhos. A mais de 50 anos no ramo<br>
            continuamos firmes em ajudar você em realizar o sonho da casa propria. Com toda certeza temos um<br>
            lugar que seja perfeito para você confira em nosso site os imoveis e terrenos disponiveis e venha nós fazer um visita.</p>

            <p><b>Estamos localizados na cidade de Suzano, numero 187, AV Conde de Carvalho.</b></p>
            <p> <b>Horario de Funcionamento 6h as 18h de Seg a Sex</b></p>
            <p>Gostou de algo ? então entre em contato pelo formulario a baixo !!</p>
        </div>
        <section id="contato" class="containner">
            <div class="text-center">
                <h2>Entre em contato</h2>
            </div>
            
            <div class="row justify-content-center m-5 p-3">
                <div class="col-3">
                    <form action="actions/insert.php" class="justify-content-center" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <p>Nome</p>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div >
                            <div class="form-group col-md-6">
                                <p>Email</p>
                                <input type="email " class="form-control" id="email" name="email">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <p>Telefone</p>
                                <input type="tel" class="form-control" id="tel" name="tel">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <p>Mensagem</p>
                                <textarea name="msg" id="msg" cols="18" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success form-group col-md-12" id="btn-enviar" name="btn-enviar">Enviar</button>
                    </div>
                    </form>
                </div>
        </section>
    </div>
<?php
    include_once 'includes/footer.php';
?>