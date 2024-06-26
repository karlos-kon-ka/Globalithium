<?php
session_start();

// Verificar si se ha enviado una solicitud POST y el botón "cerrar_sesion" está presente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrar_sesion'])) {
    // Destruir la sesión actual
    session_destroy();
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: index.php");
    exit;
}

include("entrada/bd.php");
?>



<!doctype html>
<html lang="en">
    <head>
        <title>Globalithium</title>

        <meta charset="utf-8" />
        
        
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link rel="icon" href="imagenes/onu.png">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            
          <nav class="navbar">
            <div class="container1">
              <a href="index.php"><img src="man-37537_640.webp" alt="" class="logo"></a>
              <ul class="nav-links">
                
                <li>
                    <a href="secciones/historia.php">Historia</a>
                    
                </li>
                <li><a href="secciones/conexiones.php">Conexiones</a></li>
                <li><a href="secciones/actualidad.php">Actualidad</a></li>
                <li><a href="secciones/usuario.php">Mí usuario</a></li>
                <li>
                    <a href="#">Registrarse</a> <!-- Aquí se ha agregado un enlace -->
                    <ul class="sub-menu">
                        <li><a href="secciones/iniciosesion.php">Iniciar sesión</a></li>
                        <li><a href="secciones/registro.php">Registrarse</a></li>
                    </ul>
                </li>
                <br>
                <form method="post">
    <li><button type="submit" class="btn btn-primary" name="cerrar_sesion">Cerrar sesión</button></li>
</form>
            </ul>
            
            
             
              
              <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
              </div>
            </div>
          </nav>
        </body>       
  
  <script >
            const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
          hamburger.classList.toggle('change');
          navLinks.classList.toggle('open');
        });

        function toggleMenu() {
          var navLinks = document.querySelector('.nav-links');
          navLinks.classList.toggle('open');
        }
        document.addEventListener('DOMContentLoaded', function() {
          var menuLink = document.getElementById('menu-link');
          var navLinks = document.querySelector('.nav-links');
      
          menuLink.addEventListener('click', function(event) {
              event.preventDefault(); // Evita el comportamiento predeterminado del enlace
              navLinks.classList.toggle('open'); // Alterna la clase para mostrar u ocultar el menú
          });
      });
      
        

  </script>

        </header>

        <style>
        
          nav{
            margin-bottom: 50px;
            box-shadow: 1px 1px 15px black;
          }
          .navbar {
            background-color: #e0c085;
            
            padding: 20px 0;
            border-bottom-left-radius:12px ;
            border-bottom-right-radius:12px ;
          }
          
          .container1 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
          }
          
          .logo {
            margin: 0;
          }
          img{
            height: 100%;
            width: 100%;
            max-width: 150px;
            max-height: 150px;
          }
          .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
          }
          
          .nav-links li {
            display: inline-block;
            margin-left: 20px;
          }
          
          .nav-links li a {
            color: #393232;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s;
            transition: background-color 0.3s;
          }
          
          .nav-links li a:hover {
            color: #edf0e4;
            background-color: #b98ef1;
            padding: 4px;
            border-radius: 6px;
          }
          
          .sub-menu {
            display: none;
            position: absolute;
            background-color: #a7a4a4;
            padding: 20px; /* Aumenta el espacio alrededor del submenú */
            border-radius: 5px;
            
            text-align: center;
        }
        
        .nav-links li:hover .sub-menu {
            display: block;
          
            padding-bottom: 10px; /* Aumenta el espacio alrededor del submenú cuando se muestra */
        }
        
          
          .sub-menu li {
            display: block;
            text-align: center;
            font-size: 20px;
          }
          
          .sub-menu li a {
            color: #fff;
            text-decoration: none;
            text-align: center;
            transition: color 0.3s;
            font-size: 30px;
          }
          
          .sub-menu li a:hover {
            color: #ff9900;
          }
          
        
        
        
        
        
          .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
          }
          
          .line {
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin: 3px 0;
            transition: transform 0.3s, opacity 0.3s;
          }
          
          @media (max-width: 500px) {
            .container {
              flex-direction: column;
            }
          
            .nav-links {
              display: none;
              width: 100%;
              text-align: center;
              margin-top: 10px;
              transition: opacity 0.3s ease; /* Añade una transición para suavizar la aparición */
            }
            
            .nav-links.open {
              display: flex; /* Muestra los enlaces cuando se abre el menú */
              flex-direction: column;
            }
            
            .nav-links li {
              text-align: center;
              margin: 10px 0;
            }
            
          
            .hamburger {
              display: flex;
              margin: 15px;
            }
          
            .change .line:nth-child(1) {
              transform: rotate(-45deg) translate(-5px, 6px);
            }
          
            .change .line:nth-child(2) {
              opacity: 0;
            }
            .sub-menu {
              display: none;
              position: absolute;
              background-color: #a7a4a4;
              padding: 10px;
              border-radius: 5px;
              margin: 5px;
              text-align: center;
            }
            
            .nav-links li:hover .sub-menu {
              display: block;
            }
          
            .change .line:nth-child(3) {
              transform: rotate(45deg) translate(-5px, -6px);
            }
          }
          
          
        </style>

  </body>
</html>