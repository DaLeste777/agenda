<?php

//Para não exibir mensagem de alerta
error_reporting(1);

//Importa a conexão do BD
include_once "conecta_bd.php";

//Pegar o id passado via GET
$id = $_GET["id"];

//Criar o comando SQL
$sql = "SELECT * from agenda WHERE id = $id";

//Executa o comando SQL
$retorno = $con->query($sql);

//Obtem registro do que foi retornado do BD
$registro = $retorno->fetch_array();

//Obtem dados do registro
$contato = $registro["contato"];
$telefone = $registro["telefone"];
$grupo = $registro["grupo"];



?>


<html>

<head>
    <title>Agenda</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind-dark.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-400 ...">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div>
            <img style="max-width:30px; max-height:30px; padding-left:10px;" src="https://play-lh.googleusercontent.com/D-haUsSx771Pt4brCyFEJUNKZaC8NUsD2bMB-ZL_yE2LnYdmt3YbgfZwDDM9B-wBHw=w240-h480-rw" />
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Agenda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

            </ul>
            <form method="POST" class="input-group mb-1 justify-content-end">
                <input class="col-md-4" type="text" name="filtro" value="<?php echo $_POST["filtro"]; ?>" class="form-control" placeholder=" Pesquise seus contatos" aria-label="Recipient's username" aria-describedby="button-addon2">
                <input type="submit" value="OK" class="btn btn-info">
            </form>
        </div>
    </nav>
    <br>

    <table border="1" class="table table-dark mx-auto" style="max-width:70%;">
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>

        <tr>
            <td>Contato</td>
            <td><?php echo $contato; ?></td>
        </tr>

        <tr>
            <td>Telefone</td>
            <td><?php echo $telefone; ?></td>
        </tr>

        <tr>
            <td>Grupos</td>
            <td><?php echo $grupo; ?></td>
        </tr>


    </table>
    <div class="text-center">
        <a class="btn btn-info" href="listar.php">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>