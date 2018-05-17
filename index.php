<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3.1.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="bootstrap-3.1.1-dist/js/jquery/jquery-1.11.1.min.js"></script>
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script src="jquery/jquery-1_3_2.min.js"></script>
        <script src="jquery/maskedinput.js"></script>
        <script src="jquery/masks.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">SisClínica</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#about">Institucional</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Paciente <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_paciente.php">Listar Paciente</a></li>
                                <li><a href="index.php?pagina=incluir_paciente.php">Incluir Paciente</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Opções <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Consultas</a></li>
                                <li><a href="#">Agenda</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron">
                <h1>SisClínica</h1>
                <p>Sistema de Controle de Pacientes e Consultas</p>
                <p><a class="btn btn-primary btn-lg glyphicon glyphicon-info-sign" role="button">Saiba Mais</a></p>
            </div>
        </div>

        <?php
            if (isset($_GET['pagina']) != '') {
                include_once $_GET['pagina'];
            }
        ?>

        <div class="footer ">
            <div class="container">
                <hr>
                <p class="text-muted text-center">&copy; 2018 | Tadeu E. P.</p>
            </div>
        </div>
        <script src="jquery/jquery-3_2_1.slim.min.js"></script>
        <script src="jquery/jquery-1_9_1.min.js"></script>
    </body>
</html>
