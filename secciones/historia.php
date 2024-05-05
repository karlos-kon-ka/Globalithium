<?php
        include("../secciones/nav.html");
        include("../entrada/bd.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia: Antes y después de Cristo</title>
    <link rel="stylesheet" href="../estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        
        
       
        
        .mivideo2 {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .container {
            
            z-index: 1;
            margin-top: 25px;
        }
        
        
        
        
        .temario {
            list-style: none;
            font-size: 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    
       <div>
       <video  autoplay muted class="guerra" src="../ia-videos/guerra.mp4"></video>
       </div>
   
    <main class="container">
        <div class="row">
            <div class="col">
                <section id="antes-de-cristo">
                    <a href="ac-dc/ac.php"><h2 class="mt-5">Antes de Cristo</h2></a>
                    <p style="padding: 5px; font-size:25px;  margin:5px; border-radius:8px; text-align:center">¡Antes de Cristo, la historia era una locura sangrienta! Guerras Médicas, conquistas de Alejandro Magno... ¡era como Game of Thrones pero sin dragones! Estos conflictos no solo cambiaron mapas, sino que dejaron un rastro de destrucción que resonó en la historia para siempre.</p>
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
            <div class="col">
                <section id="despues-de-cristo">
                    <a href=""><h2 class="mt-5">Después de Cristo</h2></a>
                    <p style="padding: 5px; margin:5px; font-size:25px; border-radius:8px; text-align:center">Contenido sobre la historia después del nacimiento de Jesucristo.</p>
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
