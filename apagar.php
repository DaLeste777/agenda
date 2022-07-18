<?php
//Para não exibir mensagem de alerta
error_reporting(1);

//Importa a conexão do BD
include_once "conecta_bd.php";

//Pegar o id passado via GET
$id = $_GET["id"];

//Criar o comando SQL
 $sql = "DELETE from agenda WHERE id = $id";

//Executa o comando SQL
$retorno = $con->query( $sql );

//Apagou?

if( $retorno == true) {
        
    echo 
    "<script>
        alert('Registro deletado com sucesso!');
        location.href = 'listar.php';
    </script>";
} else {

    "<script>
        alert('Erro ao deletar contato!');
        localtion.href = 'listar.php';
    </script>";

}
?>