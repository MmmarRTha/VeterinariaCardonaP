<?php

     require "config.php";

     if (isset($_POST['submit'])) {
          $sql = "SELECT * 
          FROM mascota
          WHERE Nombre = :Nombre";
          
          try {
               $statement = $conn->prepare($sql);
               $statement->bindParam(':Nombre', $_POST['Nombre'], PDO::PARAM_STR);
               $statement->execute();

               $resultado = $statement->fetchAll();

          } catch(PDOException $error) {
               echo $error->getMessage();
          }
     }
     ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Busqueda de mascotas</title>
        <link rel="stylesheet" href="../resources/css/style.css" type="text/css">

    </head>

    <body>
        <header class="header">
            <img id="logoVet" src="../resources/css/images/vet logo.jpg" alt="vet-logo">
            <div class="header-texto">
                <h1>Veterinaria Cardona</h1>
            </div>
        </header>
        <h3>Buscar mascota por su nombre</h3>
        <div class="buscador search-bar">
            <form method="post" class="formulario">
                <div class="space-between">
                    <label for="Nombre">Nombre de mascota</label>
                </div>
                <div class="space-between">
                    <input type="text" id="Nombre" name="Nombre" class="espacio-input input_text">
                </div>
                <div class="space-between">
                    <input type="submit" name="submit" value="Buscar" class="btn_search">
                </div>
                <div class="space-between">
                    <a href="create.php" class="btn_new">Nuevo</a>
                </div>
                <div class="space-between">
                    <a href=" ../index.html " class="btn-primario">Salir</a>
                </div>
            </form>
        </div>
        <!-- php tabla busqueda -->
        <?php
      if(isset($_POST['submit'])){
          if($resultado && $statement->rowCount() > 0) { ?>
            <h3>RESULTADOS</h3>
            <div class="tabla-linea">
                <table>
                    <thead>
                        <tr class="head ">
                            <th class="hide ">#</th>
                            <th>Especie</th>
                            <th>Nombre</th>
                            <th class="hide ">Fecha de nacimiento</th>
                            <th class="hide ">Raza</th>
                            <th>Sexo</th>
                            <th class="hide ">Color</th>
                            <th>Nombre del propietario</th>
                            <th class="hide ">Teléfono</th>
                            <th class="hide ">Observaciones</th>
                            <th class="hide " colspan="2 ">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $fila) :?>
                        <tr class="row-color">
                            <td class="hide"><?php echo $fila["ID"]; ?></td>
                            <td><?php echo $fila["Especie"]; ?></td>
                            <td><?php echo $fila["Nombre"]; ?></td>
                            <td class="hide"><?php echo $fila["Nacimiento"]; ?></td>
                            <td class="hide"><?php echo $fila["Raza"]; ?></td>
                            <td><?php echo $fila["Sexo"]; ?></td>
                            <td class="hide"><?php echo $fila["Color"]; ?></td>
                            <td><?php echo $fila["Propietario"]; ?></td>
                            <td class="hide"><?php echo $fila["Telefono"]; ?></td>
                            <td class="hide"><?php echo $fila["Observaciones"]; ?></td>
                            <td class="hide"><a class="btn_update" href="update-single.php?id=<?php echo $fila[ "ID"]; ?>">Editar</a></td>
                            <td class="hide "><a class="btn_delete" href="delete.php?id=<?php echo $fila["ID"]; ?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
                <div class="mensaje-sistema">
                    <blockquote>NO HAY DATOS QUE TENGAN ESTE NOMBRE:  <?php echo $_POST['Nombre']; ?>.</blockquote>
                </div>
            <?php }
          } ?>
            <!-- fin busqueda php -->
    </body>

    </html>