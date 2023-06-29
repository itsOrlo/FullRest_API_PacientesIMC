<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINICA FINAL</title>
    <!-- CSS local -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/botones.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Listado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="grupos.php">Grupos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">Más</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="text-center pt-4 m-1">
        <h2 class="mb-5">🩺 Grupo Pacientes 🩺</h2>
    </section>

    <section>
        <div class="text-center table-responsive p-5 m-1">




            <select id="comboBox" class="btn btn-outline-dark btn-lg">
                <option value="">Todos</option>
                <option value="Normal">Normal</option>
                <option value="Peso bajo">Peso bajo</option>
                <option value="Obesidad grado I">Obesidad grado I</option>
                <option value="Obesidad grado II">Obesidad grado II</option>
                <option value="Obesidad grado III">Obesidad grado III</option>
                <option value="Sobrepeso">Sobrepeso</option>
            </select>

            <!-- <input data-table="table_id"> -->






            <table id="gruposIMC" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Altura(m)</th>
                    <th>Peso(kg)</th>
                    <th>IMC</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody id="Pacientukis">
                    <?php

                    // llamar datos de una api
                    $url = "http://localhost:8000/api/pacientukis/";
                    $json = file_get_contents($url);
                    $datos = json_decode($json, true);

                    $numero = 0;

                    // Recorrer Array simple
                    foreach ($datos as $key) {
                    ?>
                        <tr>
                            <td><?php echo $key['id'] ?></td>
                            <td><?php echo $key['nombre'] ?></td>
                            <td><?php echo $key['apellido'] ?></td>
                            <td><?php echo $key['edad'] ?></td>
                            <td><?php echo $key['altura'] ?></td>
                            <td><?php echo $key['peso'] ?></td>
                            <td><?php echo $key['imc'] ?></td>
                            <td><?php echo $key['estado'] ?></td>
                            <td>
                                <a href="actualizar.php?id=<?php echo $key['id'] ?>">
                                    <button type="button" class="btn btn-info">Editar</button>
                                </a>
                            </td>
                            <td>
                                <a href="../src/del.php?id=<?php echo $key['id'] ?>">
                                    <button type="button" class="btn btn-dark">Eliminar</button>
                                </a>

                            </td>

                        </tr>

                    <?php
                    }
                    ?>

                </tbody>

            </table>
            <script>
                const comboBox = document.getElementById("comboBox");
                const table = document.getElementById("Pacientukis");
                const rows = table.getElementsByTagName("tr");

                comboBox.addEventListener("change", function() {
                    const searchTerm = comboBox.value.toLowerCase();
                    let cells;

                    for (let i = 0; i < rows.length; i++) {
                        cells = rows[i].getElementsByTagName("td");

                        if (cells[7].innerHTML.toLowerCase().indexOf(searchTerm) === -1) {
                            rows[i].style.display = "none";
                        } else {
                            rows[i].style.display = "";
                        }
                    }
                });
            </script>

        </div>
        <div class="text-center">

            <div class="frame">

                <a class="custom-btn btn-15" href="registro.php">REGISTRAR PACIENTE</a>

            </div>

        </div>


    </section>

    <section class="text-center pt-4">

        <img src="../src/a.jpeg">

    </section>



</body>

<footer>

    <div class="container-fluid text-center p-3">

        <p>© 2020 Hospituki. All Rights Reserved | Design by Orlo</p>

    </div>
    <script src="js/funciones.js"></script>
    <script src="js/buscador.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</footer>

</html>