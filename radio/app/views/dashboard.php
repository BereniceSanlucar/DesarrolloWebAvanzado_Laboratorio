<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Welcome - Screen">
    <meta name="author" content="Berenice Sanlúcar & Ignacio Nevarez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Referencia al código de las hojas de estilo -->
    <link rel="stylesheet" href="/radio/public/css/styles.css?version=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title><?php echo $data['title']?></title>
</head>
<body>
    <!-- Inclusión de la barra de navegación -->
    <?php require APPROOT . '/views/baseStructure/navbar.php'?>

    <!-- Código de implementación de la lista de estaciones -->
    <section id="section-dashboard">
        <?php foreach($data['stations'] as $station) : ?>
            <div class="container-dashboard">
                <div class="output-container ">
                    <div class="output-left">
                        <a href = "<?php echo $station->mountPoint ?>">
                            <i class="material-icons"><?php echo $data["radioIcon"] ?></i>
                        </a>
                    </div>
                    <div class="output-right">
                        <a href = "<?php if($station->username == $_SESSION['username']) {
                            echo URLROOT; ?>/edit/<?php echo $station->stationID; 
                        } else {
                            echo '';
                        } ?>">
                            <button class="edit" <?php if($station->username != $_SESSION['username']) {
                                echo 'disabled';
                            } ?>>
                                <i class="material-icons"><?php echo $data["editIcon"] ?></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div id="title-station">
                    <h3><?php echo $station->subject ?></h3>
                </div>
                <div class="output">
                    <div class="output-addon">
                        <i class="material-icons"><?php echo $data["faceIcon"] ?></i>
                    </div>
                    <p><?php echo $station->username ?></p>
                </div>
                <div class="output">
                    <div class="output-addon">
                        <i class="material-icons"><?php echo $data["eventIcon"] ?></i>
                    </div>
                    <p><?php echo $station->date ?> - <?php echo $station->time ?></p>
                </div>
                <div class="output-right">
                    <a href = "<?php if($station->username == $_SESSION['username']) {
                        echo URLROOT; ?>/delete/<?php echo $station->stationID; 
                    } else {
                        echo '';
                    } ?>">
                        <button class="delete" <?php if($station->username != $_SESSION['username']) {
                            echo 'disabled';
                        } ?>>
                            <i class="material-icons"><?php echo $data["deleteIcon"] ?></i>
                        </button>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </section>

    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>
</html>