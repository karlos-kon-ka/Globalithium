<?php
include("../secciones/nav.php");
include("../entrada/bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el archivo correctamente
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
        // Acceder al archivo y procesarlo
        $foto = htmlspecialchars(trim($_FILES["foto"]["name"]));
        
        $usuario = isset($_POST['usuario']) ? htmlspecialchars(trim($_POST['usuario'])) : "";
        $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : "";

        if (!empty($usuario) && !empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`foto`, `usuario`, `password`) VALUES (:foto, :usuario, :password)");
            $sentencia->bindParam(":usuario", $usuario);
            $sentencia->bindParam(":password", $hashed_password);
            $sentencia->bindParam(":foto", $foto);
            $registro = $sentencia->execute();

            $fecha_foto = new DateTime();
            $nombre_foto = $fecha_foto->getTimestamp() . "_" . ($foto);
            $tmp_fotos = $_FILES["foto"]["tmp_name"];

            if ($tmp_fotos != "") {
                move_uploaded_file($tmp_fotos, "../imagenes/" . $nombre_foto);
            }

            if ($registro) {
                echo "<div><p style='padding:5px; background-color:white;'>Registro exitoso. ¡Bienvenido!</p>
                <br> <a href='iniciosesion.php'>Iinicie sesión.</a></div>";
            } else {
                echo "Ha ocurrido un error al registrar el usuario. Por favor, inténtalo de nuevo.";
            }
        } else {
            echo "Por favor, completa todos los campos del formulario.";
        }
    } else {
        // Si no se ha enviado un archivo o ha ocurrido un error en la subida
        echo "Por favor, seleccione una imagen válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            background-color: #000; /* Color de fondo */
        }
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1; /* Coloca el canvas detrás de los demás elementos */
        }
        .content-container {
            text-align: center;
            margin: 25px;
            padding: 10px;
            box-shadow: 1px 1px 10px black;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el contenido */
        }
    </style>
</head>
<body>

    <!-- Canvas para el fondo de partículas -->
    <canvas id="particle-canvas"></canvas>

    <!-- Contenido principal -->
    <div class="content-container">
        <img class="card-img-top" src="../imagenes/onu.png" alt="Title" />
        <h3 style="text-align: center;">Únete</h3>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Foto de perfil</label>
                    <input
                        type="file"
                        class="form-control form-control-sm"
                        name="foto"
                        id="foto"
                        aria-describedby="helpId"
                        placeholder="Foto de perfil"
                    />
                    <label for="" class="form-label">Nombre de usuario</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="usuario"
                        id="usuario"
                        aria-describedby="helpId"
                        placeholder="Usuario"
                    />

                    <label for="" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        class="form-control form-control-sm"
                        name="password"
                        id="password"
                        aria-describedby="helpId"
                        placeholder="Contraseña"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var particleSettings = {
            numParticles: 100, // Número de partículas
            particleSize: 3, // Tamaño de las partículas
            particleSpeed: 1, // Velocidad de las partículas
            particleColor: '#ffffff', // Color de las partículas
        };

        function createParticleBackground() {
            var canvas = document.getElementById('particle-canvas');
            var ctx = canvas.getContext('2d');
            var particles = [];

            function init() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
                for (var i = 0; i < particleSettings.numParticles; i++) {
                    particles.push({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        vx: Math.random() * particleSettings.particleSpeed * 2 - particleSettings.particleSpeed,
                        vy: Math.random() * particleSettings.particleSpeed * 2 - particleSettings.particleSpeed
                    });
                }
                animate();
            }

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (var i = 0; i < particles.length; i++) {
                    var p = particles[i];
                    ctx.fillStyle = particleSettings.particleColor;
                    ctx.fillRect(p.x, p.y, particleSettings.particleSize, particleSettings.particleSize);

                    p.x += p.vx;
                    p.y += p.vy;

                    if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                    if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
                }
                requestAnimationFrame(animate);
            }

            init();
        }

        document.addEventListener('DOMContentLoaded', createParticleBackground);
        window.addEventListener('resize', createParticleBackground);
    </script>
</body>
</html>
