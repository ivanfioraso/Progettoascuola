<?php
// Inizia la sessione
session_start();

// Controlla se i cookie sono già stati accettati
$cookiesAccepted = isset($_SESSION['cookiesAccepted']) ? $_SESSION['cookiesAccepted'] : false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se il modulo è stato inviato, imposta la sessione per i cookie accettati
    $_SESSION['cookiesAccepted'] = true;
    $cookiesAccepted = true;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IvanTrip - Agenzia di Viaggi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/home.style.css" />
    <link rel="icon" href="../../public/assets/logo.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Barra del titolo con icona, nome e bottoni */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(51, 51, 51, 0.8);
            color: white;
            padding: 10px 20px;
            width: 100%;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo i {
            font-size: 24px;
            margin-right: 10px;
        }

        .navbar .logo span {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .buttons {
            display: flex;
            gap: 10px;
        }

        .navbar .buttons button {
            background-color: white;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .navbar .buttons button:hover {
            background-color: #f0f0f0;
        }

        /* Contenitore per il carousel */
        .carousel-container {
            position: relative;
            width: 90%; /* Impostato al 90% della larghezza della pagina */
            max-width: 1200px; /* Larghezza massima */
            margin-top: 20px;
            overflow: hidden;
            height: 250px; /* Ridotto l'altezza */
            display: flex;
            justify-content: center;
            background-color: transparent; /* Trasparente */
        }

        .carousel {
            display: flex;
            transition: transform 1s ease;
        }

        .carousel-item {
            flex: 0 0 25%; /* Ogni immagine occupa il 25% della larghezza, mostrandone 4 alla volta */
            padding: 5px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Bottoni di navigazione */
        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 24px;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
        }

        .carousel-button.left {
            left: 10px;
        }

        .carousel-button.right {
            right: 10px;
        }

        /* Sezione Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(51, 51, 51, 0.8);
            color: white;
            width: 100%;
        }

        /* Sezione Intro */
        .intro {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            width: 100%;
        }

        .intro h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .intro p {
            font-size: 18px;
            margin: 20px 0;
        }

        .intro button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .intro button:hover {
            background-color: #555;
        }
        body {
            font-family: Arial, sans-serif;
        }
        #cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #ffcc00; /* Colore vivace */
            color: #333;
            padding: 20px;
            text-align: center;
            display: <?php echo $cookiesAccepted ? 'none' : 'block'; ?>; /* Nascondi se accettato */
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }
        #cookie-banner button {
            background-color: #28a745; /* Verde brillante */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            margin-left: 10px;
        }
        #cookie-banner button:hover {
            background-color: #218838; /* Verde scuro al passaggio del mouse */
        }
    </style>
</head>
<body>

    <!-- Barra del titolo con icona, nome e bottoni -->
    <div class="navbar">
        <div class="logo">
            <img src="../../public/assets/logo.png" alt="Logo" style="width: 48px; height: 48px; margin-right: 10px;">
            <span>IvanTrip</span>
        </div>
        <div class="buttons">
            <button onclick="window.location.href='../html/login.html'">Accedi</button>
            <button onclick="window.location.href='../html/register.html'">Registrati</button>
        </div>
    </div>

    <!-- Carousel -->
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item"><img src="../../public/assets/gg.jpg" alt="Foto 1"></div>
            <div class="carousel-item"><img src="../../public/assets/neve.jpg" alt="Foto 2"></div>
            <div class="carousel-item"><img src="../../public/assets/download.jpeg" alt="Foto 3"></div>
            <div class="carousel-item"><img src="../../public/assets/mont.jpg" alt="Foto 4"></div>
            <div class="carousel-item"><img src="../../public/assets/isolla.webp" alt="Foto 5"></div>
            <div class="carousel-item"><img src="../../public/assets/cas.jpeg" alt="Foto 6"></div>
            <div class="carousel-item"><img src="../../public/assets/neva.avif" alt="Foto 7"></div>
            <div class="carousel-item"><img src="../../public/assets/tropic.jpeg" alt="Foto 8"></div>
        </div>
        
    </div>

    <!-- Sezione Introduzione -->
    <div class="intro">
        <h1>Benvenuti su IvanTrip  <br>   Agenzia di Viaggi</h1>
        <p>Esplora le migliori destinazioni, trova offerte esclusive e prenota il viaggio dei tuoi sogni!</p>
        <button onclick="window.location.href='/xampp/htdocs/Fioraso/frontend/html/destinazioni.html'" >Scopri le Destinazioni</button>
    </div>

    <!-- Sezione Offerte Speciali -->
    <div class="special-offers">
        <div class="card-container-up">
            <div class="offer-card">
                <img src="../../public/assets/tropic.jpeg" alt="Offerta 1">
                <h3>Offerta Spiagge Tropicali</h3>
                <p>Scopri le migliori spiagge tropicali e prenota la tua vacanza al mare!</p>
                <br><br>
                <button class="offer-card-button" onclick="window.location.href='/Fioraso/offerta1.html'">Vedi Offerta</button>
            </div>
            <div class="offer-card">
                <img src="../../public/assets/romantica.jpeg" alt="Offerta 2">
                <h3>Weekend Romantico</h3>
                <p>Un weekend speciale per te e la tua dolce metà in una delle città più romantiche.</p>
                <br><br>
                <button class="offer-card-button" onclick="window.location.href='/Fioraso/offerta2.html'">Vedi Offerta</button>
            </div>
            <div class="offer-card">
                <img src="../../public/assets/montagna.jpeg" alt="Offerta 3">
                <h3>Avventura in Montagna</h3>
                <p>Un'avventura mozzafiato nelle montagne più belle, perfetta per gli amanti dell'outdoor.</p>
                <br><br>
                <button class="offer-card-button" onclick="window.location.href='/Fioraso/offerta3.html'">Vedi Offerta</button>
            </div>
        </div>
        


        <!-- Nuove offerte aggiunte sotto le precedenti -->
        <div class="card-container-down">
            <div class="offer-card">
                <img src="../../public/assets/caption.jpg" alt="Offerta 4">
                <h3>Tour Culturale</h3>
                <p>Scopri le meraviglie storiche e culturali in un tour esclusivo delle città d'arte.</p>
                <button onclick="window.location.href='/Fioraso/offerta4.html'">Vedi Offerta</button>
            </div>
            <div class="offer-card">
                <img src="../../public/assets/safari.jpg" alt="Offerta 5">
                <h3>Safari Safari!</h3>
                <p>Un viaggio indimenticabile in Africa, tra emozionanti safari e paesaggi mozzafiato.</p>
                <button onclick="window.location.href='/Fioraso/offerta5.html'">Vedi Offerta</button>
            </div>
        </div>
    </div>

    <!-- Sezione Pacchetto Viaggi -->
    <div class="travel-package">
        <br><br>
        <h2>Scopri tutte le nostre offerte</h2>
        <p>Approfitta delle nostre offerte esclusive: 5 viaggi in 6 mesi o 1 anno. Pianifica la tua avventura con noi e risparmia!</p><br><br>
        <button onclick="window.location.href='../html/packtrip.html'">Scopri di più</button>
    </div>
    <div>
        <br>
    </div>
    <!-- Sezione Footer -->
    <div class="footer">
        <p>&copy; 2025 IvanFarm. Tutti i diritti riservati.</p>
    </div>

    <div id="cookie-banner">
        Questo sito utilizza i cookie per migliorare l'esperienza dell'utente. 
        <form method="POST" style="display: inline;">
            <button type="submit">Accetta</button>
        </form>
    </div>
    
</body>
</html>





 
