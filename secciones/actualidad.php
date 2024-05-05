<?php
include("../secciones/nav.html");
include("../entrada/bd.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualidad</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .slider-container {
    width: 600px;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}

.slider {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    min-width: 100%;
}

 .slider img {
    width: 100%;
    height: 100%;
    max-width: 250px;
    max-height: 250px;
    border-radius: 6px;
   
}

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            background-color:burlywood; /* Color de fondo */
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

        @media screen and (max-width: 500px) {
            .slider-container {
    width: 400px;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}

.slider {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    min-width: 100%;
}

 .slider img {
    width: 100%;
    height: 100%;
    max-width: 250px;
    max-height: 250px;
    border-radius: 6px;
   
}
        }
    </style>
</head>
<body>
<div class="slider-container">
        <div class="slider">
            <div class="slide">
                <img src="../imagenes/chip.webp" alt="Slide 1">
                <h4>Neuralink chip</h4>
            </div>
            <div class="slide">
                <img src="../imagenes/chip2.png" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="../imagenes/chipeada.jpg" alt="Slide 3">
            </div>
        </div>
</div>
   
    <canvas id="particle-canvas"></canvas>


   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

 
    <script>




       //slider
       document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
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

    setInterval(nextSlide, 3000); // Cambia el slide cada 3 segundos
});






       
        var particleSettings = {
            numParticles: 50, // Número de partículas
            particleSize: 4, // Tamaño de las partículas
            particleSpeed: 0.5, // Velocidad de las partículas
            particleColor: 'white', // Color de las partículas
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

            // Función para animar las partículas
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
