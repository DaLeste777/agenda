<?php

$con = new mysqli("localhost","root", "", "localbd");
    if ( $con->connect_errno ) {

        //Erro ao conectar?
        echo "Erro ao conectar: " . $con->connect_erro;
    }

?>