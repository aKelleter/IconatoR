<?php
    // Chargement de la configuration
    require_once 'src/conf.php';
    // Chargement des fonctions
    require_once 'src/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/bootstrap.min.css" rel="stylesheet">
    <title>IconatoR : Informations</title>
    <link rel="shortcut icon" href="src\favicon.ico">  
    <link type="text/css" rel="stylesheet" href="src/style.css">    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h1 class="text-center mt-2 mb-5"><span class="border rounded p-4"><span class="maj">I</span>CONATO<span class="maj">R</span></span></h1>
                
                <!-- Navigation -->
                <form action="" method="post" class="mt-5">
                    <a class="btn btn-primary" href="index.php">Icons</a>                   
                    <a class="btn btn-info" href="info.php">Info</a>
                </form>      
                   
                <hr>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 mb-4">      
                <h2>ICONS APPLICATION</h2>  
                <h3>Informations</h3>
                <div>
                    <p>
                        Il existe  deux fichiers pour stocker des icônes utiles dans les applications :
                    </p>
                    <ul>
                        <li><b><?= PATH_SVG_FILES ?>icons-common.php</b> : Contient les icônes communes à toutes les applications, les icônes génériques</li>
                        <li><b><?= PATH_SVG_FILES ?>icons-application.php</b> : Contient les icônes spécifiques à l'application en cours</li>
                    </ul>
                    <p>
                        Pour ajouter une nouvelle icône dans un des deux fichiers vous coller le code SVG que vous avez copié préalablement dans le presse papier : <br>
                        Exemple : Bootstrap : <a href="https://icons.getbootstrap.com/icons/bag/" target="_blank">Bag</a>
                     </p>
<code>                
<pre>                          
    &lt;svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16"&gt;
        &lt;path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/&gt;
    &lt;/svg&gt; 
</pre>
</code>    
                     <p>
                        Après voir collé ces lignes dans le bon fichier, vous devez effectuer quelques modifications
                     </p>
                     <ol>
                         <li><b>Modifier</b> le nom des balises "<b>svg</b>" en "<b>symbol</b>"</li>
                         <li><b>Ajouter</b> un attribut id="nom_de_l_icone", utilisé pour l'affichage</li>
                         <li><b>Supprimer</b> les attributs qui ne sont pas nécessaires</li>                         
                         <li><b>Enregistrer</b> le fichier</li>
                         <li><b>Regénérer</b> les fichiers ".svg" qui contiennent les icônes en utilisant le bouton "<b>Generate Icons Files</b>", il est situé en haut de la page <b>Display</b></li> 
                     </ol>
                     <p>
                         Exemple :
                     </p>
<code>                     
<pre>                          
    &lt;symbol id="bag" viewBox="0 0 16 16"&gt;
        &lt;path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/&gt;
    &lt;/symbol&gt; 
</pre>
</code>
                     
                     <h5 class="text-danger">
                         <b>Le code à utiliser pour afficher une icône</b>    
                     </h5>    
                     <p>
                         Dans l'application, il suffit de cliquer sur le bouton <span class="toCopy small border rounded-2 btn-small btn-primary" style="padding: 2px;">copy</span>                          , pour copier le code de l'icône dans le presse-papier.
                     </p>
                     <p>Ci-dessous, un exemple de code :</p>
                     
                     
<code class="text-primary">                     
<pre>                          
 &lt;svg class="icon" width="24" height="24"&gt;
    &lt;use href="#bag"&gt;&lt;/use&gt;
 &lt;/svg&gt;
</code>                     
</pre>                          
                     
                     <hr>
                     <h3>Fonctionnement du système</h3>
                     <h5>
                         Le chargement des fichiers ".svg" est réalisé grâce à l'exécution d'un code JavaScript sur toutes les pages de l'application
                     </h5>    
                     
<code>
<pre>
// Charger le fichier SVG et insérer les symboles dans le DOM
fetch('../../../thm/mesa/img/icons/icons-common.svg')
    .then(response => response.text())
    .then(data => {
        document.getElementById('svg-icons-common').innerHTML = data;
    })
    .catch(error => console.error('Erreur lors du chargement du fichier : icons-common.svg:', error));
    
fetch('../../../thm/mesa/img/icons/icons-application.svg')
    .then(response => response.text())
    .then(data => {
        document.getElementById('svg-icons-application').innerHTML = data;
    })
    .catch(error => console.error('Erreur lors du chargement du fichier : icons-application.svg:', error));
</pre>
</code>
                     <h5>
                         La préparation à l'affichage est effectuée par la présence de deux div dans le code HTML
                     </h5>
<code>
<pre>
<!-- Conteneur pour les icones SVG -->
&lt;div id="svg-icons-common" style="display: none;"&gt;&lt;/div&gt;
&lt;div id="svg-icons-application" style="display: none;"&gt;&lt;/div&gt;
</pre>
</code>
                <p>
                    Example d'utilisation : <a href="src/sample/index.html" target="_blank">IconatoR Sample</a>
                </p>
                </div>
            </div>
            <hr class="mb-5">
            <footer class="text-center">| <?= APP_NAME ?> | <?= APP_VER ?> | <?= APP_LICENCE ?> | <?= APP_README ?> |</footer>                      
        </div>
    </div>
</body>
</html>
