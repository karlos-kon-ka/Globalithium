<?php

include("nav.php");
include("../entrada/bd.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexiones Globales de Industrias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Conexiones Globales de Industrias</h1>
    </header>
    <section class="content">
        <p>Explora las conexiones y relaciones entre diferentes industrias a nivel mundial.</p>
        <div class="button-container">
            <button id="explore-btn">Explorar</button>
        </div>
    </section>



    <section >
        
        <img class="slide" src="../imagenes/fifa.png"  alt="">
        <img class="slide" src="../imagenes/fifa.png"  alt="">
        <p  class="dentro"></p>
        <img class="slide" src="../imagenes/fifa.png"  alt="">
        <img class="slide" src="../imagenes/fifa.png "  alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <img class="slide" src="../imagenes/fifa.png"  alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <img class="slide" src="../imagenes/fifa.png" alt="">
        <br>
        <p class="dentro"></p>
        <img class="slide" src="fotos/edi.jpg" alt="">
       
       </section>
       <div class="intro2">
        <p>
            Las fotos de Horus, una deidad egipcia, nos llevan a las antiguas civilizaciones 
            del Valle del Nilo, donde la arquitectura monumental, como el Templo de Edfu, rinde homenaje a esta deidad protectora. Las imágenes de Ghana nos transportan a la rica historia de este país, desde los vibrantes mercados hasta los castillos coloniales que cuentan la historia del comercio de esclavos. Además, las fotografías que capturan la lucha por los derechos humanos en África reflejan la resistencia y la determinación de las personas en su búsqueda de justicia y equidad. Estas imágenes son testigos poderosos de la historia y 
            la lucha continua por la libertad y la igualdad en el continente africano.
        </p>
        </div>





    <script src="script.js"></script>
</body>
</html>


<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}
.intro{
    color: aliceblue;
    margin-top: 0;
    text-align: center;
    
    width: 100%;
    background-color: rgb(230, 55, 55);
    
    position: sticky;
    top: 0;
    animation: enace-header linear both;
    animation-timeline: scroll(root block);
    animation-range: 0 200px;
    z-index: 1;
}
.intro2{
    background-color: azure;
    padding: 10px;
    border-radius: 8px;
    margin: 10px;
    margin-top: 50px;
    text-align: center;

}
.intro3{
    background-color: azure;
    padding: 10px;
    border-radius: 8px;
    margin: 10px;
    margin-top: 50px;
    text-align: center;

}
@keyframes revelar {
    from
    {
        opacity: 0;
        translate: 0 100px;
        scale: 0.5;
    }
    to{
        opacity: 1;
        translate: 0 0;
        scale: 1;
    }
    
}
@keyframes enace-header{
    to{
        background-color: rgb(9, 12, 10);
        backdrop-filter: blur(4px);
        
        color: rgb(219, 202, 241);
    }

}
section{
    background: linear-gradient(yellow, rgb(88, 57, 57));
    margin: 10px;
    border-radius: 8px;
    box-shadow: 1px 1px 10px white;
    columns: 2;
    padding: 10px;
    column-gap: 25px;
    margin-top: 50px;
}

.slide{
    border-radius: 8px;
    
    cursor: pointer;
    width: 100%;
    height: 100%;
    max-height: 620px;
    margin-bottom: 10px;
    border: solid 1.5px white;
    box-shadow: 1px 1px 10px white ;
    animation: revelar linear both;
    animation-timeline: view();
    animation-range: entry 30% cover 60%;
}
.dentro{
    background-color: aliceblue;
    padding: 8px;
    border-radius: 5px;
    box-shadow: 1px 1px 10px red;
    animation: revelar linear both;
    animation-timeline: view();
    animation-range: entry 30% cover 60%;
}


footer{
    color: white;
    text-align: center;
    
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px 0;
    
}

.frame iframe{
    width: 100%;
    max-width: 400px;
    gap: 20px;
}
.luchadores{
    display: flex;
    columns: 2;
    text-align: center;
}
@media screen and (max-width: 400px){
    card{
        width: 100%;
        max-width: 100px;
    }
}
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.content {
    text-align: center;
    margin-top: 50px;
}

p {
    font-size: 18px;
    margin-bottom: 20px;
}

.button-container {
    display: flex;
    justify-content: center;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

</style>
<script>
    document.getElementById('explore-btn').addEventListener('click', function() {
    // Aquí puedes agregar las acciones que desees al hacer clic en el botón.
    alert('Explorando conexiones globales...');
});

</script>