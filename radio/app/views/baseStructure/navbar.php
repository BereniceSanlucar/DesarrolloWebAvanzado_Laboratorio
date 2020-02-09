<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset = "UTF-8">
    <meta name = "description" content = "Navbar - Piece">
    <meta name = "author" content = "Berenice Sanlúcar & Ignacio Nevarez">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <!-- Referencia al código de las hojas de estilo -->
    <link rel = "stylesheet" href = "/radio/public/css/styles.css?version=1.0">
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <title>Navbar</title>
</head>
<body>
    <!-- Código de implementación de la barra de navegación -->
    <nav id="container-navbar">
        <h2 id="container-left">
            <?php 
                session_start();
                echo $_SESSION['username']
            ?>
        <h2>
        <ul id="container-right">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/welcome">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/addStation">
                    Add Station
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/logout">
                    Log Out
                </a>
            </li>
        </ul>
    </nav>
</body>