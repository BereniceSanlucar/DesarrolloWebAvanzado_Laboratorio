<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Login - Screen">
    <meta name="author" content="Berenice Sanlúcar & Ignacio Nevarez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Referencia al código de las hojas de estilo -->
    <link rel="stylesheet" href="/radio/public/css/styles.css?version=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title><?php echo $data['title']?></title>
</head>
<body>
    <!-- Inclusión de la cabecera -->
    <?php require APPROOT . '/views/baseStructure/header.php'?>

    <!-- Código de implementación del formulario de inicio de sesión -->
    <section id="section-login">
        <div id="container-login">
            <div id="title">
                <i class="material-icons"><?php echo $data['lockIcon']?></i> 
                <?php echo $data['title']?>
            </div>
            <form action="<?php echo $data['loginAction']?>" method="POST">
                <div class="input">
                    <div class="input-addon">
                        <i class="material-icons"><?php echo $data['faceIcon']?></i>
                    </div>
                    <input class="input-enter" name="username" placeholder="Username" type="text" autocomplete="off">
                </div>
                <span class="invalid-feedback"><?php echo $data['usernameError']?></span>
                <div class="input">
                    <div class="input-addon">
                        <i class="material-icons"><?php echo $data['vpnKeyIcon']?></i>
                    </div>
                    <input name="password" placeholder="Password" type="password" autocomplete="off">
                </div>
                <span class="invalid-feedback"><?php echo $data['passwordError']?></span>
                <div>
                    <input type="submit" value="Log In">
                </div>
            </form>
            <div class="signup">
                <?php echo $data['signupMessage']?>
                <a href = "<?php echo $data['signupLink']?>">
                    <br>
                        <button id = "signup-link"><?php echo $data['signupButton']?></button>
                    </br>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>
</html>