<?php

include("nav.php");
include("../entrada/bd.php");


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia: Antes y después de Cristo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .guerra-vid {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .guerra {
            width: 100%;
            height: auto;
            opacity: 0.8;
        }
        
        .container {
            z-index: 1;
            margin-top: 25px;
        }
        .container video{
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        
        a {
            text-decoration: none;
            color: #212529;
        }
        
        .temario {
            list-style: none;
            font-size: 18px;
            margin-bottom: 10px;
            border-radius: 8px;
            padding: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .temario:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            font-size: 32px;
            margin-top: 20px;
            color: #343a40;
        }
        
        p {
            font-size: 20px;
            margin-top: 10px;
            color: #6c757d;
        }
    </style>
</head>
<body class="text-center">
    
    <section class="logo-section">
        <div class="container">
            <video src="../ia-videos/guerra.mp4"></video>
        </div>
    </section>
    
    <main class="container">
        <div class="row">
            <div class="col">
                <section id="antes-de-cristo">
                    <a href="ac-dc/ac.php"><h2 class="mt-5">Antes de Cristo</h2></a>
                    <p>¡Antes de Cristo, la historia era una locura sangrienta! Guerras Médicas, conquistas de Alejandro Magno... ¡era como Game of Thrones pero sin dragones! Estos conflictos no solo cambiaron mapas, sino que dejaron un rastro de destrucción que resonó en la historia para siempre.</p>
                    <section>
                        <div>
                            <ul>
                                <li class="temario">Ascenso del Imperio Acadio (2334 a.C. - 2154 a.C.)</li>
                                <li class="temario">Caída de la ciudad de Ur (2000 a.C.)</li>
                                <li class="temario">Conquista de Jerusalén por Nabucodonosor II (587 a.C.)</li>
                                <li class="temario">Invasiones Bárbaras en el Imperio Romano (siglos III - V d.C.)</li>
                                <li class="temario">Control Romano de Oriente Medio (63 a.C. en adelante)</li>
                            </ul>
                        </div>
                    </section>
                </section>
            </div>
            <section class="logo-section">
        <div class="container">
            <video src="../ia-videos/oceano.mp4"></video>
        </div>
    </section>
            <div class="col">
                <section id="despues-de-cristo">
                    <a href=""><h2 class="mt-5">Después de Cristo</h2></a>
                    <p>Contenido sobre la historia después del nacimiento de Jesucristo.</p>
                    <section>
                        <div>
                            <ul>
                                <li class="temario">La persecución de los cristianos bajo el Imperio Romano (siglos I - IV d.C.)</li>
                                <li class="temario">La masacre de los cruzados en Jerusalén (1099 d.C.)</li>
                                <li class="temario">La Inquisición Española (siglos XV - XIX d.C.)</li>
                                <li class="temario">El genocidio armenio (1915 - 1923 d.C.)</li>
                                <li class="temario">Asedio a Palestina(Actualidad)</li>
                            </ul>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
