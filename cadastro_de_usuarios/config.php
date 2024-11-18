<?php

    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '1234';
    $dbName = 'db_cadastro_usuario';

    $conn = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

    /*teste de conexão*/
    /*if($conn->connect_errno){
        echo "Erro";
    }else{
        echo "Conectado com sucesso!";
    }*/

?>
