<?php

include("nav.php");
include("entrada/bd.php");




// Verificar si se ha enviado una solicitud POST y el botón "cerrar_sesion" está presente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrar_sesion'])) {
    // Destruir la sesión actual
    session_destroy();
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: secciones/iniciosesion.php");
    exit;
}






if($_POST){
  $megusta = isset($_POST['megusta']) ? $_POST['megusta'] : "";


  $sentencia = $conexion->prepare("INSERT INTO `posteos` (`megusta`)
  VALUES  (:megusta)");



    $sentencia->bindParam(":megusta", $megusta);

    $resultado = $sentencia->execute();
    if($resultado == TRUE){
    echo "Insertado correctamente";
    }else{
    echo "Error al insertar";

    }
}

$sentencia = $conexion->prepare("SELECT DISTINCT * FROM posteos ");
$sentencia->execute();
$lista_posteos = $sentencia->fetchAll(PDO::FETCH_ASSOC);






$sentencia = $conexion->prepare("SELECT DISTINCT * FROM usuarios ");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);





$sentencia = $conexion->prepare("SELECT DISTINCT * FROM inicio ");
$sentencia->execute();
$lista_global = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Globalitium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-+0r2FGGzFoi1nS+26Gmz2HmXaElPJVXv9FExwgvxCDFG4QTXpwDYLtxXcETa5DnB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<section class="logo-section">
    <div class="container">
        <img src="imagenes/logo-removebg-preview.png" class="logo" alt="Tu Logo">
    </div>
</section>


  <div class="container">
    <div class="slider">
      <div class="slide">
        <video  class="videosintro" autoplay loop muted>
          <source src="ia-videos/66310293b66ade4501f17a56.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="slide">
        <video class="videosintro" autoplay loop muted>
          <source src="ia-videos/6631046bb66ade4501f17bba.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div  class="slide">
        <video  class="videosintro" autoplay loop muted>
          <source src="ia-videos/66329b20a256e814bfea33ed.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
     
    </div> 
  </div>


  <div class="containerintro">
        <?php 
        if(isset($_SESSION['usuario'])) {
            echo "<div class='welcome'>¡Bienvenido, <span class='message'>".$_SESSION['usuario']."</span>!</div>";
        } else {
            
            echo "<div class='welcome'><a class='login-link' href='secciones/iniciosesion.php'>Inicia Sesión</a> o <a class='login-link' href='secciones/registro.php'>regístrate</a>.</div>";
        }
        ?>
</div>

 
<button id="scrollToTopBtn" onclick="scrollToTop()">
        <span class="arrow">&#9650;</span>
    </button>


<section>
    <div class="container mt-4">
        <div class="table-responsive">
            <table>
                <tbody>
                    <?php foreach($lista_global as $registro) { ?>
                        <tr>
                            <td>
                                <div class="cliente">
                                    <h2 class="titulo"><?php echo $registro['titulo']; ?></h2>
                                    <img class="imagen" src="imagenes/<?php echo $registro['imagen']; ?>" alt="Imagen">
                                    <?php
                                        $texto = $registro['texto'];
                                        if (strlen($texto) > 800) {
                                            $textoCorto = substr($texto, 0, 200) . "...";
                                            echo "<p class='texto texto-corto'>$textoCorto</p>";
                                            echo "<p class='texto texto-completo' style='display:none;'>$texto</p>";
                                            echo "<a class='ver-mas' href='#'>Leer</a>";
                                        } else {
                                            echo "<p class='texto'>$texto</p>";
                                        }
                                    ?>
                                    <br>
                                    <a class="fuente" href="<?php echo $registro['fuentes']; ?>"><?php echo $registro['fuentes']; ?></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section>
    <div class="container mt-4">
        <div class="table-responsive">
            <table>
                <tbody>
                    <?php foreach($lista_posteos as $megusta) { ?>
                        <tr>
                            <td>
                                <div  class="votar">
                                    <button class="pulgar-arriba"><?php echo $megusta['megusta']; ?></button>
                                    <span class="contador">0</span>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>






<script>
document.addEventListener('DOMContentLoaded', function() {
    var verMasLinks = document.querySelectorAll('.ver-mas');
    verMasLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            var textoCorto = this.previousElementSibling;
            var textoCompleto = textoCorto.nextElementSibling;
            
            if (textoCorto.style.display === 'block') {
                textoCorto.style.display = 'block';
                textoCompleto.style.display = 'none';
                this.textContent = 'Ver entero';
            } else {
                textoCompleto.style.display = 'block';
                textoCorto.style.display = 'none';
                this.textContent = 'Ver más';
            }
        });
    });
});




 var botonesPulgarArriba = document.querySelectorAll('.pulgar-arriba');
    botonesPulgarArriba.forEach(function(boton) {
        boton.addEventListener('click', function() {
            var contador = this.parentElement.querySelector('.contador');
            votarPositivo(contador);
        });
    });

function votarPositivo(contador) {
        // Comprobar si el usuario ya ha votado
        if (document.cookie.indexOf('votoRealizado=true') === -1) {
            var contadorActual = parseInt(contador.textContent); 
            contador.textContent = contadorActual + 1; 

            // Marcar el voto como realizado estableciendo una cookie
            document.cookie = 'votoRealizado=true; expires=Thu, 01 Jan 2026 00:00:00 UTC; path=/';
        } else {
            alert('Ya has votado una vez.');
        }
    }
;
</script>

</section>


<section>
<div id="documen">
  <video class="mivideo" src="ia-videos/divisas.mp4" autoplay muted loop></video>


        <div id="divi-pa">
            <p >
              
              ¡La corrupción en el mundo de las divisas es una verdadera PUTA LOCURA! <br>
               Es indignante ver malditos sinvergüenzas y entidades manipulan el sistema financiero para su propio beneficio, sin importarles las consecuencias para el resto de la sociedad. ¿Es que acaso no hay límites para la codicia y la falta de ética?
            </p>
            <p >
              
              Los nombres que vemos a continuación, no son más que peones en el tablero. <br> Por más "Endiosadas" que parezcán sus vidas, no va mas allá que una gigantesca ilusión. <br>
              Nada en esta vida se escapa a la decepción de la vida. y estas ILUSIONES no son la excepción.

            </p>
            </div>
            <br>
            <div>
            <div class="slider-container2">
            <div class="slider2">
                <div class="slide2">
                        <img src="imagenes/puta 1.jpg" alt="Slide 1">
                        <h4> Cristina Kirchner </h4>
                    </div>
                    <div class="slide2">
                    <img src="imagenes/guzman.webp" alt="Slide 2">
                    <h4>Joaquín Guzmán</h4>
                        </div>
                        <div class="slide2">
                            <img src="imagenes/pablo.avif" alt="Slide 3">
                            <h4>Pablo Escobar</h4>
                        </div>
                        <div class="slide2">
                            <img src="imagenes/carlos.jpg" alt="Slide 1">
                            <h4>Carlos Ledher</h4>
                        </div>
                        <div class="slide2">
                            <img src="imagenes/peña.jpg" alt="Slide 2">
                            <h4>Enrique Peña Nieto</h4>
                        </div>
                        <div class="slide2">
                            <img src="imagenes/puto3.jpg" alt="Slide 3">
                            <h4>Nayib Bukele</h4>
                        </div>
        </div>
</div>

            </div>

            
            <br>
 </section>
<script>
       //slider
       document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector('.slider2');
    const slides = document.querySelectorAll('.slide2');
    const slideWidth = slides[0].clientWidth;
    let index = 0;

    function nextSlide() {
        index++;
        if (index === slides.length) {
            index = 0;
        }
        updateSlide();
    }

    function updateSlide() {
        const offset = -index * slideWidth;
        slider.style.transform = `translateX(${offset}px)`;
    }

    setInterval(nextSlide, 4000); // 
});
</script>
</section>



<section class="globalization-section">
    <div class="container-glo">
        <div class="global-info">
            <h2>Globalización y Control Financiero</h2>
            <p>Vamos a ver. <br> Es de ilusos no darer cuenta la entresijos de
                 la economía de la actualidad. <br> 
               Logicamente. No se limita por las fronteras,
                ni los enfrentamientos políticos. <br> Diciendo esto , no digo que vayan todos a la una
                . O al menos en las parte más inferiores de la pirámide. <br>
            El poder se distribuye de otra manera</p>

        </div>
        <div class="global-image">
            <img src="imagenes/soros.webp" alt="Imagen de divisas">
        </div>
        
    </div>
        <div class="container-glo" >
        <a class="btn btn-primary "  href="/secciones/historia.php">Historia</a>
        </div>
</section>

<section class="modern-section">
   
    <div class="container-mod">
        <div class="modern-info">
            <h2 class="text-center">Actualidad</h2>
            <p>En las últimas décadas, Oriente Medio ha sido un escenario de conflictos exacerbados por intereses religiosos, políticos y económicos. La intersección entre el cristianismo e islam ha contribuido a tensiones arraigadas. La influencia judía en Estados Unidos, especialmente en el apoyo a Israel, ha sido significativa, desencadenando conflictos como las guerras árabe-israelíes y el conflicto palestino-israelí. Esta dinámica ha exacerbado las tensiones religiosas y políticas en la región, mientras persiste la lucha por el control, con Israel como punto focal./p>
        </div>
        <div class="modern-image">
            <img src="imagenes/judios.jpg" alt="Descripción de la imagen">
        </div>
        <br>
        <div class="container-mod">
        <a class="btn btn-primary" href="secciones/actualidad.php">Actualidad</a>
    </div>
    </div>
</section>
<section class="globalization-section2">
    <div class="container-glo2">
        <div class="global-info2">
            <h2>Control sobre tus fuentes</h2>
            <p> La comunidad Sionista judía ha desempeñado un
                 papel destacado en varios aspectos de la vida económica y cultural, incluidos Hollywood y la industria discográfica. A través de su influencia en elites económicas y su capacidad para inyectar capital en estos sectores, han moldeado la narrativa y la producción de contenido en medios de comunicación y entretenimiento. Sin embargo, es importante señalar que esta influencia no debe ser vista de manera monolítica ni atribuirse a motivos conspirativos. Si bien es cierto que hay individuos y grupos con raíces judías que ocupan posiciones prominentes en estas áreas, también hay una diversidad de opiniones y perspectivas dentro de la comunidad judía. La idea de un control absoluto es exagerada y simplista, y es esencial reconocer la complejidad
                 y la diversidad de influencias en estas industrias.</p>

        </div>
        <div class="global-image2">
            <img src="imagenes/fmi.png" alt="Imagen de prueba">
            <img src="imagenes/cia.png" alt="Imagen de prueba">
            
            <img src="imagenes/fifa.png" alt="Imagen de prueba">
            <img src="imagenes/nvidia.png" alt="Imagen de prueba">
            <img src="imagenes/onu.png" alt="Imagen de prueba">
            <img src="imagenes/Roc_a_Fella.svg" alt="Imagen de prueba">


        </div>
        
    </div>
        <div class="container-glo" >
        <a class="btn btn-primary "  href="secciones/conexiones.php">Conexiones</a>
        </div>
</section>
<footer>

</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p+ElAvv5D7eTmWrC/4fF1L18Z7U+qXRrt+7M/96A7b63KcGc4M/8pkzzj2EL+vCz" crossorigin="anonymous"></script>
<script src="scripts.js"></script> 

</body>
</html>

