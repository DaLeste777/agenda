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

//Clicou em enviar?
if ($_POST != NULL) {

    //Obtem dados digitados pelo usuário
    $contato = addslashes($_POST["contato"]);
    $telefone = addslashes($_POST["telefone"]);
    $grupo = addslashes($_POST["grupo"]);

    //Criar comando SQL
    $sql = "UPDATE agenda
            SET contato = '$contato',
                telefone = '$telefone',
                grupo = '$grupo'
                WHERE id = $id";

    //Executa o SQL no BD
    $retorno = $con->query($sql);

    //Atualizou?
    if ($retorno == true) {

        echo
        "<script>
            alert('Registro atualizado com sucesso!');
            location.href = 'listar.php';
        </script>";
    } else {

        "<script>
            alert('Erro ao atualizar contato!');
            localtion.href = 'cadastrar.php';
        </script>";
    }
}
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
           
        </div>
    </nav>
    <br>


    <form method="POST" class="bg-gradient-to-r from-blue-500 to-purple-400 ... form-control col-md-4 mx-auto">

        <label>Contato</label>
        <input type="text" name="contato" class="form-control" value="<?php echo $contato ?>" required>

        <br>

        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="<?php echo $telefone ?>" required>

        <br>

        <label>Grupo</label>
        <select name="grupo" class="form-control" required>
            <option value="">Selecione</option>
            <option <?php if ($grupo == "Amigo") echo "selected"; ?> value="Amigo">Amigo</option>
            <option <?php if ($grupo == "Familia") echo "selected"; ?> value="Familia">Familia</option>
        </select>

        <br>
        
            <input class="btn btn-primary float-center" type="submit" value="Enviar">
      
        
    </form>

    <div class="text-center">
        <a class="btn btn-info" href="listar.php">Voltar</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>

</html>