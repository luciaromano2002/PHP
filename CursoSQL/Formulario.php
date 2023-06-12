<!DOCTYPE html>
<html lang="ES-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
</head>

<body>
    <form method="post" action="">
      
     <div class="container"> 

     <h2>Formulario de registro</h2> 
     

     <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        <label for="floatingInput">Nombre</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
        <label for="floatingInput">Apellido</label>
      </div>

        <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Correo electronico</label>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
      </div>
 
      <?php
        if(isset ($_POST["submit"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];

       if(empty($nombre) || empty($apellido) || empty($email)) {
        header("Location: formulario.html?mensaje=Por%20favor,%20ingrese%20su%20nombre%20,%20apellido%20y%20correo%20electrónico");
        exit();
       } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: formulario.html?mensaje=El%20correo%20electrónico%20ingresado%20no%20es%20válido");
        exit();
        } else {
        echo "<h1>Formulario enviado correctamente</h1>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellido: $apellido</p>";
        echo "<p>Correo electrónico: $email</p>";
        }

      $servername = "localhost";
      $username = "root"; 
      $password = "";
      $dbname = "CursoSQL";  

      $conn = new mysqli($servername, $username, $password, $dbname);
      
      if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
      }

      $sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL)
      VALUES ('$nombre', '$apellido', '$email')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error:" .$sql . "<br>" . $sconn->error;
      }
      $conn->close();

        }
    ?>

  </form>
    
</body>
</html>