<?php
error_reporting(1);

include_once "conecta_bd.php";

//Iniciar o filtro vazio
$filtro_sql = "";


//Clicou em filtrar?
if ($_POST != NULL) {


    //obtem filtro digitado pelo usuário
    $filtro = $_POST["filtro"];

    // Cria filtro em SQL
    $filtro_sql = "WHERE id = '$filtro'
                   OR contato LIKE '%$filtro%'
                   OR telefone LIKE '%$filtro%'
                   OR grupo LIKE '%$filtro%'
                   ";
}


?>

<html>

<head>
    <title>Agenda</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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

    <div>
        <div class="text-center">
            <a class="btn btn-primary btn-sm" href="cadastrar.php">Cadastrar novo contato</a>
        </div>

        <br>

        <table border="1" class="table table-striped table-dark mx-auto" style="max-width:70%;">

            <tr>
                <th>ID</th>
                <th>Contato</th>
                <!--<th>Telefone</th>
                <th>Grupo</th>-->

                <th>Ações</th>
            </tr>

            <?php
            //Cria comando SQL
            $sql = "SELECT * from agenda $filtro_sql";

            //Executa no BD
            $retorno = $con->query($sql);


            //Percorre todos os registros retornados
            while ($registro = $retorno->fetch_array()) {

                //Obtem os dados do registro
                $id = $registro["id"];
                $contato = $registro["contato"];
                $telefone = $registro["telefone"];
                $grupo = $registro["grupo"];

                //Imprimi na tabela com os dados do registro
                echo "<tr>
                    <th>$id</th>
                    <th>$contato</th>
                    <!--<th>$telefone</th>
                    <th>$grupo</th>-->
                    <td>
                        <a class='btn btn-outline-light' href='ver.php?id=$id'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-list' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
                            </svg>
                        </a>
                    <a class='btn btn-outline-light' href='editar.php?id=$id'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                        </svg>
                    </a>
                    <a class='btn btn-outline-danger' onclick='return confirm(\"Deseja deletar este item?\");' href='apagar.php?id=$id'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>
                    
                    
                  </tr>";
            }




            ?>



        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</body>

</html>