<?php
include("../entrada/bd.php");
include("nav.html");

if($_POST){
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
    $texto = isset($_POST['texto']) ? $_POST['texto'] : "";
    $imagen = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "";
    $fuentes = isset($_POST['fuentes']) ? $_POST['fuentes'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `inicio` (`titulo`, `imagen`, `texto`, `fuentes`)
    VALUES  (:titulo, :imagen, :texto, :fuentes)");

    $fecha_foto = new DateTime();
    $nombre_foto = $fecha_foto->getTimestamp() . "_" . $imagen;
    $tmp_fotos = $_FILES["imagen"]["tmp_name"];

    if($tmp_fotos != ""){
        if(move_uploaded_file($tmp_fotos, "../imagenes/".$nombre_foto)) {
            // File moved successfully
        } else {
            // File move failed
            echo "Error al subir la imagen.";
        }
    }

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":texto", $texto);
    $sentencia->bindParam(":fuentes", $fuentes);
    $sentencia->bindParam(":imagen", $nombre_foto); // Store filename in database

    $resultado = $sentencia->execute();

    if($resultado) {
        echo "Producto insertado correctamente.";
    } else {
        echo "Error al insertar el producto.";
    }
}
?>

<div class="card">
    <div class="card-header">Actualizando</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto:</label>
                <input type="text" class="form-control" name="texto" id="texto" aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="fuentes" class="form-label">Fuentes:</label>
                <input type="text" class="form-control" name="fuentes" id="fuentes" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Elija foto:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
            </div>

            <button type="submit" role="button" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</div>
