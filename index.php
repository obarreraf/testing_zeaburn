<?php
const API_URL = "https://www.whenisthenextmcufilm.com/api";

#Inicializo una nueva sesionde curl ; ch = cURL handle
$ch = curl_init(API_URL);

// Indicar recibir el resultado ;)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la peticion y guardar el resultado */

$result = curl_exec($ch);
$data = json_decode($result, true);

?>

<head>
    <meta charset="UTF-8" />
    <title>La Próxima pelicula de Marvel</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <img src=<?= $data["poster_url"]; ?> width="300" title=<?= $data["title"]; ?> style="border-radius:16px">
    </section>
        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en: <?= $data["days_until"]; ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La siguiente es:<?= $data["following_production"]["title"]; ?> y se estrena en: <?= $data["following_production"]["days_until"]; ?> días</p>
        </hgroup>
</main> 

<style>

    body {
        display: grid;
        place-content: center;
    }

    section{
        display : flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>