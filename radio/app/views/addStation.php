<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Add Station - Screen">
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

    <!-- Código de implementación del formulario de registro de estaciones -->
    <section id="section-addStation">
        <div id="container-addStation">
            <div id = "title">
                <i class = "material-icons"><?php echo $data['radioIcon']?></i> 
                <?php echo $data['title']?>
            </div>
            <form method="POST" action="<?php 
                if(empty($data['station'])) {
                    echo $data['addStationAction'];
                } else {
                    echo URLROOT; ?>/editStation/<?php echo $data['station']->stationID;
                }
            ?>">
                <div class = "input">
                    <div class = "input-addon">
                        <i class = "material-icons"><?php echo $data['subjectIcon']?></i>
                    </div>
                    <input name = "subject" placeholder = "Subject" type = "text" autocomplete = "off" value ="<?php 
                        if(empty($data['station'])) {
                            echo '';
                        } else {
                            echo $data['station']->subject;
                        }
                    ?>">
                </div>
                <span class="invalid-feedback"><?php echo $data['subjectError']?></span>
                <div class = "input">
                    <div class = "input-addon">
                        <i class = "material-icons"><?php echo $data['dateIcon']?></i>
                    </div>
                    <input name = "date" placeholder = "Date: mm/dd/yyyy" type = "text" autocomplete = "off" value ="<?php 
                        if(empty($data['station'])) {
                            echo '';
                        } else {
                            echo $data['station']->date;
                        }
                    ?>"> 
                </div>
                <span class="invalid-feedback"><?php echo $data['dateError']?></span>
                <div class = "input">
                    <div class = "input-addon">
                        <i class = "material-icons"><?php echo $data['timeIcon']?></i>
                    </div>
                    <input name = "time" placeholder = "Time: 21:00" type = "text" autocomplete = "off" value ="<?php
                        if(empty($data['station'])) {
                            echo '';
                        } else {
                            echo $data['station']->time;
                        }
                    ?>">
                </div>
                <span class="invalid-feedback"><?php echo $data['timeError']?></span>
                <div class = "input">
                    <div class = "input-addon">
                        <i class = "material-icons"><?php echo $data['mountPointIcon']?></i>
                    </div>
                    <input name = "mountPoint" placeholder = "Mount Point" type = "url" autocomplete = "off" value ="<?php 
                        if(empty($data['station'])) {
                            echo '';
                        } else {
                            echo $data['station']->mountPoint;
                        }
                    ?>">
                </div>
                <span class="invalid-feedback"><?php echo $data['mountPointError']?></span>
                <div>
                    <input type = "submit" value = "Save" />
                </div>
            </form>
        </div>
    </section>

    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>