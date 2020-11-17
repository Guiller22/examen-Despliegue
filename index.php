<?php

require_once 'vendor/ballen/distical/src/Distical.inc.php';
use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
use Illuminate\Http\Request;
use SujalPatel\IntToEnglish\IntToEnglish;



error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_REQUEST['calcular'])) {
    $longitudPunto1 = $_REQUEST['longitudPunto1'];
    $latitudPunto1 = $_REQUEST['latitudPunto1'];
    $longitudPunto2 = $_REQUEST['longitudPunto2'];
    $latitudPunto2 = $_REQUEST['latitudPunto2'];
    $punto1 = new LatLong($longitudPunto1, $latitudPunto1);
    $punto2 = new LatLong($longitudPunto2, $latitudPunto2);
    $distanceCalculator = new DistanceCalculator($punto1, $punto2);

    echo '<p class="resultado">La distancia entre valladolid y sevilla es '. $distanceCalculator->get().'';
    $distanciaIngles = IntToEnglish::Int2Eng($distanceCalculator->get());
    echo '<p class="resultado">La distancia entre los dos puntos en ingles es '. $distanciaIngles;
};
echo '
<head>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>


    <div class="row">

        <div class="col s12  blue center-align card-panel teal lighten-2">
            <h4>Examen Despliegue Aplicaciones Web</h4>
        </div>
        
        <div class="col s12  ">
            
            <p>Lo que vamos a realizar es una aplicacion en PHP, que realize lo siguiente:
            <ol>
            <li>Dado dos puntos calcular la distancia entre ellos. Esos puntos vendran marcados por su latitud y su longitud </li>
            <li>Una vez halla calculado la distancia quiero que me traduzca al ingles esa distancia.</li>
            </ol>
            </p>
            <p>
            Por ejemplo dadas las siguientes coordenadas:
            <ul>
            <li>(41.65518, -4.72372) corresponde a Valladolid </li>
            <li>(37.38283, -5.97317) corresponde a Sevilla </li>
            </ul>
            
            </p>
        
            
        </div>
        <aside>
                    <h5>Enlace Heroku </h5>
                    Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
                    <p>
                    <a title="Heroku" href="https://examen-despliegue.herokuapp.com/"><img src="imagenes/heroku.png" alt="Heroku" width="120" height="120" /></a>
                    </p>
        </aside>
        <form class="col s12" method = "POST">
            <div class="row">
                
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Latitud Punto 1:</label>
                    <input name="latitudPunto1" type="text" class="validate">
                    
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Longitud  Punto 1:</label>
                    <input name="longitudPunto1" type="text" class="validate">
                
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Latitud Punto 2:</label>
                    <input name="latitudPunto2" type="text" class="validate">
                
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Longitud  Punto 2:</label>
                    <input name="longitudPunto2" type="text" class="validate">
                
                </div>
               

                <div class="row "></div> <!-- linea en blanco -->
                <div class="col s4">

                    <button class="btn waves-effect waves-light" type="submit" name="calcular">Calcular

                    </button>

                </div>
                
            </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>';
