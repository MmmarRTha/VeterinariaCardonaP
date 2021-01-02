   <!DOCTYPE html>
   <html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar paciente</title>
        <link rel="stylesheet" href="../resources/css/style.css" type="text/css">
   </head>
   <body>
          <header class="header">
            <img id="logoVet" src="../resources/css/images/vet logo.jpg" alt="vet-logo">
            <div class="header-texto">
                <h1>Veterinaria Cardona</h1>
            </div>
          </header>

   <?php require "config.php";
     if (isset($_GET['id'])) {

          $sql = "SELECT * FROM mascota
          WHERE ID = :id";
          
          try {
               $statement = $conn->prepare($sql);
               $statement->bindValue(':id', $_GET['id']);
               $statement->execute();

               $mascota = $statement->fetch(PDO::FETCH_ASSOC);

          } catch(PDOException $error) {
               echo $error->getMessage();
          }
     } else {
          echo "Se necesita un ID de la mascota a editar";
          exit;
     }

     if (isset($_POST['submit'])){
          $cliente = [
               "ID" => $_POST["ID"],
               "Especie" => $_POST["Especie"],
               "Nombre" => $_POST["Nombre"],
               "Nacimiento" => $_POST["Nacimiento"],
               "Raza" => $_POST["Raza"],
               "Sexo" => $_POST["Sexo"],
               "Color" => $_POST["Color"],
               "Propietario" => $_POST["Propietario"],
               "Telefono" => $_POST["Telefono"],
               "Observaciones" => $_POST["Observaciones"]
          ];

          $sql = "UPDATE mascota
               SET ID = :ID,
                    Especie = :Especie,
                    Nombre = :Nombre,
                    Nacimiento = :Nacimiento,
                    Raza = :Raza,
                    Sexo = :Sexo,
                    Color = :Color,
                    Propietario = :Propietario,
                    Telefono = :Telefono,
                    Observaciones = :Observaciones
               WHERE ID = :ID";

          try {
               $statement = $conn->prepare($sql);
               $statement->execute($cliente);
          } catch(PDOException $error) {
               echo $error->getMessage();
          }     
     }
     ?>

     <?php if(isset($_POST['submit']) && $statement) : ?>
          <div class="mensaje-update">
               <blockquote><?php echo $_POST['Nombre']; ?>. SE HA MODIFICADO EXITOSAMENTE!</blockquote>
          </div>
          
     <?php endif; ?>

     <h3>Editar registro</h3>
          <div class="login">
            <fieldset class="form">
              <form method="post" id="form">
                <?php foreach($mascota as $key => $value) : ?>
                <div class="campo-input">
                  <label class="uppercase" for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
                </div>
                <div class="campo-input">
                  <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo($key === 'ID' ? 'readonly' : null); ?>>
                </div>
               <?php endforeach; ?>
              <div >
                <input type="submit" name="submit" value="Modificar" id="modificar" class="btn_save">
              </div>
            </fieldset>
            </form>
          </div>
          <div class="volver-link">
               <a href="read.php">Volver</a>
          </div>
     
               <!-- fin codigo php -->
          <footer>
               <strong>Copyright &copy; 2020 Veterinaria Cardona. Todos los derechos reservados. </strong><a href="https://twitter.com/mmmarrtha" target="_blank">Diseño Web</a> por Martha Nieto.
          </footer>
   </body>
   </html>
