<?php 
    //conexão DB
    require_once 'connect.php';

    //inicia sessao
    session_start();	

    //Clear
    function clear($input){
        global $connect;
        //sql
        $var = mysqli_escape_string($connect, $input);
        //xss
        $var = htmlspecialchars($var);
        return $var;
    }

    if(isset($_POST['btn-enviar'])):
        
        $nome = clear($_POST['nome']);
        $email = clear($_POST['email']);
        $tel = clear($_POST['tel']);
        $msg = clear($_POST['msg']);
        
        $sql = "INSERT INTO contatos(nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$tel', '$msg')";
        if(mysqli_query($connect, $sql)):
            require 'email.php';
           //header('location: ../index.php');
        else:
            echo "ERRO ao cadastrar";
        endif; 
        //header('location: ../index.php');
        
    endif;
?>