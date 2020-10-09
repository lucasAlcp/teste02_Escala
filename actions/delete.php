<?php
    require_once 'connect.php';

    session_start();

    if(isset($_POST['excluir'])){
        $id= mysqli_escape_string($connect,$_POST['id_b']);
        $caminho ="../img/". mysqli_escape_string($connect,$_POST['caminho']);
        unlink($caminho);
        $sql = "DELETE FROM banners WHERE id=".$id;


        if(mysqli_query($connect, $sql)){
            header('location: ../admin.php');
        }
        else{
            echo 'ERRO';
        }
    }
    //header('location: admin.php');

?>