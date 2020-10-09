<?php
    //Conexão com o banco de dados

    //dados
    //$serverName = "mysql.escalaweb.com.br";
    $serverName = "localhost";
    $username = "root";
    //$password = "3sd54f";
    $password = "";
    $db_name = "escalaweb16";
    //$db_name = "escalaweb16";

    $connect = mysqli_connect($serverName,$username,$password,$db_name);
    mysqli_set_charset($connect,"utf8");
    if(mysqli_connect_error()):
        echo "ERRO na conexão: ".mysqli_connect_error();
    endif;
?>