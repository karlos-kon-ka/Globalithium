<?php
session_start();
include("nav.html");
include("../entrada/bd.php");

if ($_POST) {
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Consultar la contraseña hasheada desde la base de datos
    $sentencia = $conexion->prepare("SELECT password FROM usuarios WHERE usuario=:usuario");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->execute();

    $usuario_registrado = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($usuario_registrado) {
        
        if (password_verify($password, $usuario_registrado['password'])) {
            
            $_SESSION['usuario'] = $usuario;
            $_SESSION['logueado'] = true;

           
            echo "<div style='background-color:white; padding: 5px; color: black; border-radius; display:flex; align-items:center'>Ha Iniciado sesión correctamente.</div>";
        } 
    } else {
        echo "Usuario y/o contraseña incorrectos";
    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color:beige;" >






    
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-6"> <!-- Cambié col por col-lg-6 para que ocupe la mitad del ancho en pantallas grandes -->
            <div class="card text-center">
                <div class="login">
                <form action="" method="post">
                        <h3 class="mb-4">Inicio de sesión</h3> <!-- Aumenté el margen inferior para separar del resto del contenido -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" class="form-control form-control-lg" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control form-control-lg" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña" />
                        </div>
                        <div class="mb-3">
                            <button  class="btn btn-primary btn-lg" type="submit">Enviar</button> <!-- Aumenté el tamaño del botón -->
                            <a href="index.html" class="btn btn-info btn-lg">Volver</a> <!-- Aumenté el tamaño del botón -->
                        </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
