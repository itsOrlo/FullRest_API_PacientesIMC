<?php

//capturar id para la API
$id = $_GET['id'];

// Llamar al dato exacto de la api por id
$url = "http://localhost:8000/api/pacientukis/".$id;
$json = file_get_contents($url);

// vardump
//var_dump($json);

// Transformar JSON
$datos = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO PARA PERROS</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/botones.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-custom navbar-mainbg pb-0">
        <a class="navbar-brand navbar-logo" href="index.php"><img src="../src/logo.png" height="50px"></img></a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Listado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grupos.php">Grupos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);">Más</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="container pt-4">
        <div class="container text-center ml-4 mr-4">

            <h2 class="mb-4">ACTUALIZAR PACIENTE</h2>
            <form method="POST" action="../controlador/controladorPUT.php" enctype="multipart/form-data">

                <div class="mb-3 ">
                    <label class="form-label">Nombre</label>
                    <input type="text" hidden class="form-control" name="id" value="<?php echo $datos[0]['id'] ?>" required>
                    <input type="text" class="form-control text-center" name="nombre" value="<?php echo $datos[0]['nombre'] ?>" required>
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Apellido</label>
                    <input type="text" class="form-control text-center" name="apellido" value="<?php echo $datos[0]['apellido'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edad</label>
                    <input type="number" name="edad" class="form-control text-center" value="<?php echo $datos[0]['edad'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Altura(m)</label>
                    <input type="float" name="altura" class="form-control text-center" value="<?php echo $datos[0]['altura'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso(kg)</label>
                    <input type="float" name="peso" class="form-control text-center" value="<?php echo $datos[0]['peso'] ?>" required>
                </div>

                <div class="text-center d-grid gap-2 col-12 mx-auto">
                    <button id="myModal" type="submit" class="custom-btn btn-15" name="enviar">
                        ACTUALIZAR PACIENTE
                    </button>



            </form>



        </div>


    </section>

    <section class="text-center pt-4">

    </section>

</body>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center">Todos los derechos reservados</p>
            </div>
        </div>
    </div>
    <script src="js/funciones.js"></script>
</footer>

</html>