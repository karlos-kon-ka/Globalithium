<?php

include("../secciones/nav.php");
include("../entrada/bd.php");

// Verifica si el usuario ha iniciado sesión
if(isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    

    // Prepara la consulta para seleccionar solo el usuario que ha iniciado sesión
    $sentencia = $conexion->prepare("SELECT usuario, foto FROM usuarios WHERE usuario = :usuario");
    $sentencia->bindParam(':usuario', $usuario);
    
    $sentencia->execute();
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un usuario
    if ($usuario) {
        // Mostrar la información del usuario
?>
        <div class="card">
            <div class="card-body">
                <img src="<?php echo $usuario['foto']; ?>" >
                <input style="padding: 8px; border-radius:8px; text-align:center" type="text" value="<?php echo $usuario['usuario']; ?>">
                
            </div>
        </div>
        <button class="btn btn-primary">Editar</button>
<?php
    } else {
        // No se encontró un usuario con la sesión actual
        echo "No se encontró el usuario.";
    }
} else {
    // Maneja el caso en el que el usuario no ha iniciado sesión
    echo "<div class='inicie'>Debe iniciar sesión para ver esta página.
     <br> <a href='iniciosesion.php'>Inicia Sesión</a> </div>";
}
?>
<style>
    a{
        text-decoration: none;
        font-size: 20px;
    }
    .inicie{
        text-align: center;
        padding: 10px;
        background-color: lightblue;
        border-radius: 8px;
        margin: 20px;
    }
</style>