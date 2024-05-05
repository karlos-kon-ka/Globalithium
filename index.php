<?php
session_start(); 
include("nav.html");
include("entrada/bd.php");







if($_POST){
  $titulo = isset($_POST['megusta']) ? $_POST['megusta'] : "";


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
    <title>Globalitium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-+0r2FGGzFoi1nS+26Gmz2HmXaElPJVXv9FExwgvxCDFG4QTXpwDYLtxXcETa5DnB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>



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
            
            echo "<div class='welcome'><a class='login-link' href='secciones/registro.php'>Inicia Sesión</a> o <a class='login-link' href='secciones/registro.php'>regístrate</a>.</div>";
        }
        ?>
</div>
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
                                        if (strlen($texto) > 200) {
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
                                    
                                    
                                    
                                        <div  class="votar">
                                            <button class="pulgar-arriba" <?php echo $registro ['megusta']   ?>>👍</button>
                                            <span class="contador">0</span>
                                        </div>
                                    
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    <!-- Cierre del primer bucle foreach -->
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
            
            if (textoCompleto.style.display === 'none') {
                textoCorto.style.display = 'none';
                textoCompleto.style.display = 'block';
                this.textContent = 'Ver menos';
            } else {
                textoCorto.style.display = 'block';
                textoCompleto.style.display = 'none';
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
              
              ¡La corrupción en el mundo de las divisas es una verdadera PUTA LOCURA! <br>
               Es indignante ver malditos sinvergüenzas y entidades manipulan el sistema financiero para su propio beneficio, sin importarles las consecuencias para el resto de la sociedad. ¿Es que acaso no hay límites para la codicia y la falta de ética?
            </p>
            </div>
            <br>
            <div>
            <div class="slider-container2">
            <div class="slider2">
                <div class="slide2">
                        <img src="imagenes/chip.webp" alt="Slide 1">
                        <h4>Neuralink chip</h4>
                    </div>
                    <div class="slide2">
                    <img src="imagenes/chip2.png" alt="Slide 2">
                        </div>
                        <div class="slide2">
                            <img src="imagenes/chipeada.jpg" alt="Slide 3">
                        </div>
                        <div class="slide2">
                            <img src="imagenes/chip.webp" alt="Slide 1">
                            <h4>Neuralink chip</h4>
                        </div>
                        <div class="slide2">
                            <img src="imagenes/chip2.png" alt="Slide 2">
                        </div>
                        <div class="slide2">
                            <img src="imagenes/chipeada.jpg" alt="Slide 3">
                        </div>
        </div>
</div>

            </div>

            <div id="divi-pa">
            <p >
              
              ¡La corrupción en el mundo de las divisas es una verdadera PUTA LOCURA! <br>
               Es indignante ver malditos sinvergüenzas y entidades manipulan el sistema financiero para su propio beneficio, sin importarles las consecuencias para el resto de la sociedad. ¿Es que acaso no hay límites para la codicia y la falta de ética?
            </p>
            <p >
              
              ¡La corrupción en el mundo de las divisas es una verdadera PUTA LOCURA! <br>
               Es indignante ver malditos sinvergüenzas y entidades manipulan el sistema financiero para su propio beneficio, sin importarles las consecuencias para el resto de la sociedad. ¿Es que acaso no hay límites para la codicia y la falta de ética?
            </p>
            </div>
            <br>
            <div>
</div>
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

    setInterval(nextSlide, 4000); // Cambia el slide cada 3 segundos
});
</script>
</section>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p+ElAvv5D7eTmWrC/4fF1L18Z7U+qXRrt+7M/96A7b63KcGc4M/8pkzzj2EL+vCz" crossorigin="anonymous"></script>
<script src="scripts.js"></script> 

</body>
</html>

