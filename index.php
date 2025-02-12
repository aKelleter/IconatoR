<?php
    // Chargement de la configuration
    require_once 'src/conf.php';    
    // Chargement des fonctions
    require_once 'src/functions.php';

    // Chemin vers le fichier contenant les symboles SVG
    $icons_app = 'icons-application.php';
    $icons_common = 'icons-common.php';
    
    $msg_icon_app = '';
    $msg_icon_common = '';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //echo 'POST';
        // Générer le fichier SVG
        $msg_icon_app = generateSVG($icons_app, 'icons-application');
        $msg_icon_common = generateSVG($icons_common, 'icons-common');
        
        header("Refresh:2, url=index.php");
    }
    
    // Affiche les symboles SVG
    $icons_app = displaySVG($icons_app);
    $icons_common = displaySVG($icons_common);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/bootstrap.min.css" rel="stylesheet">
    <title>IconatoR : Home</title>
    <link rel="shortcut icon" href="src\favicon.ico">   
    <link type="text/css" rel="stylesheet" href="src/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-2 mb-5"><span class="border rounded p-4"><span class="maj">I</span>CONATO<span class="maj">R</span></span></h1>
                
                <!-- Navigation -->
                <form action="" method="post" class="mt-4">
                    <a class="btn btn-info" href="index.php">Icons</a>
                    <input type="submit" class="btn btn-primary" value="Generate Icons Files" />
                    <a class="btn btn-primary" href="info.php">Info</a>
                </form>                 
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">     
                <div id="copied" class="alert text-center"></div>
                <h2>ICONS APPLICATION</h2>  
                <p class="small">source : <?= PATH_SVG_FILES ?>icons-application.svg</p>                
                <?= $msg_icon_app ?>
                <?= $icons_app ?>
                <hr>
                <h2>ICONS COMMON</h2> 
                <p class="small">source : <?= PATH_SVG_FILES ?>icons-common.svg</p>                
                <?= $msg_icon_common ?>
                <?= $icons_common ?>
            </div>
            <hr class="mt-5 mb-5">
            <footer class="text-center">| <?= APP_NAME ?> | <?= APP_VER ?> | <?= APP_LICENCE ?> | <?= APP_README ?> |</footer>            
        </div>
    </div>
    <script src="src/bootstrap.bundle.min.js"></script>
    <script src="src/icons.js"></script>
</body>
</html>
