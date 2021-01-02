   <!DOCTYPE html>
   <html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminacion de pacientes</title>
        <link rel="stylesheet" href="../resources/css/style.css" type="text/css">
   </head>
   <body>
          <header class="header">
            <img id="logoVet" src="../resources/css/images/vet logo.jpg" alt="vet-logo">
            <div class="header-texto">
                <h1>Veterinaria Cardona</h1>
            </div>
          </header>
          <h3>Borrar Pacientes</h3>
          <?php
          require "config.php";

          if (isset($_GET['id'])) {

               $sql = "DELETE FROM mascota
                    WHERE ID = :id";
               
               try {
                    $statementDelete = $conn->prepare($sql);
                    $statementDelete->bindValue(':id', $_GET['id']);
                    $statementDelete->execute();
               } catch(PDOException $error) {
                    echo $error->getMessage();
               }
          }

          $sql = "SELECT * FROM mascota";

          try {
               $statement = $conn->prepare($sql);
               $statement->execute();
               $resultado = $statement->fetchAll();

          } catch(PDOException $error) {
               echo $error->getMessage();
          }
          ?>
          <div class="mensaje-update">
            <?php if(isset($statementDelete)) echo "Registro eliminado"; ?>
          </div>
          <div class="volver-link">
               <a id="volver" href="read.php">Volver</a>
          </div>
          <div class="good-cat">
            <img id="good-cat" src="../resources/css/images/cat-good-vet.jpg" alt="cat-good-vet">
          </div>
          <footer>
               <strong>Copyright &copy; 2020 Veterinaria Cardona. Todos los derechos reservados. </strong> <br><a href="https://twitter.com/mmmarrtha" target="_blank">Diseño Web</a> por Martha Nieto.
          </footer> 
   </body>
   </html>