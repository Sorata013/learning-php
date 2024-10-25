<?php
#Creamos una constante con la URL de la API que vamos a utilizar:
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializamos una nueva sesión de cURL; ch = CURL handle:
$ch = curl_init(API_URL);
//Indicaremos a php que queremos recibir el resultado de la petición pero no mostrarlo en pantalla:
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutamos la petición y guardamos el resultado en una variable:
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

/*
 * Si sólo queremos hacer un GET de una API exite la siguiente manera para ahorrar código:
 * $result = file_get_contents(API_URL);
 */



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>la próxima película de marvel</title>
    <meta name="description" content="La próxima película de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
    <link rel="stylesheet" href="style.css">
    <script src="simplyCountdown.min.js" defer></script>
    <script src="countdown.js" defer></script>
</head>
<body>
    <main>
        <section>
            <!--<pre><?php var_dump($data);?></pre>-->
            <h1>¿CUÁNDO LLEGA LA PRÓXIMA PELÍCULA DE MARVEL?</h1>
            <h2>Quedan: </h2>
            <div id="timer"></div>
            <h2>para:</h2>
            <img src="<?=$data["poster_url"]; ?>"
                 width="300" alt="Poster de <?=$data["title"]; ?>"
                 style="border-radius: 16px"
            /><br>
            <h3><?=$data["title"];?> </h3>
            <h3>Fecha de estreno: <?=$data["release_date"]?></h3>
            <h4><?=$data["overview"];?></h4>
            <h5>La siguiente es: <?= $data["following_production"]["title"];?></h5>
        </section>
    </main>
</body>
</html>

