<?php
declare(strict_types=1);

function generateSVG(string $symbolsFile, string $nameFile): string{

    $msg = '';

    // Vérifie si le fichier des symboles existe
    if (file_exists($symbolsFile)) {

        // Inclut le fichier des symboles pour générer le contenu SVG
        ob_start();
        include $symbolsFile;
        $symbolsContent = ob_get_clean();
        
        // Crée le contenu SVG final
        $svgContent = "<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">\n $symbolsContent </svg>";
        
        // Écrit le contenu SVG dans le fichier public/sprites.svg
        file_put_contents($nameFile . '.svg', $svgContent);
        
        $msg = '<p class="alert alert-warning">The "'.$nameFile.'.svg" file has been generated successfully.</p>';
    } else {
        $msg = '<p class="alert alert-danger">The icon file was not found.</p>';
    }

    return $msg;
}

/**
 * Affiche les symboles SVG
 *
 * @param string $symbolsFile Chemin vers le fichier contenant les symboles SVG
 * @return string
 */
function displaySVG(string $symbolsFile): string
{
    
    // Vérifie si le fichier des symboles existe
    if (file_exists($symbolsFile)) {
    // Charger le fichier
        $symbolsContent = file_get_contents($symbolsFile);

        // Afficher les symboles un à un
        $symbols = explode('<symbol', $symbolsContent);

        // Supprime les balises </symbol> et les espaces
        $symbols = array_map(function ($symbol) {
            return strstr($symbol, '</symbol>', true);
        }, $symbols);

        $string = '';
        
        // Afficher les symboles
        $string .= "<div class=\"row\">\n";
            
        foreach ($symbols as $symbol) {
            if (!empty($symbol)) {

                // Récupérer l'identifiant du symbole
                preg_match('/id="([^"]+)"/', $symbol, $matches);
                if (isset($matches[1])) {
                    $idValue = $matches[1];                    
                } else {
                    $idValue = null;
                }

                // Créer le contenu SVG
                // Présentation sous la forme de colonnes
                $string .= '<div class="col-md-3 text-center mb-4" style="display: inline;">';
                $string .= '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="40" height="40"  '.$symbol.'>';                
                $string .=  "</svg>\n";
                $string .=  '<div class="p-1 bg-info bg-opacity-10 border border-info rounded mb-1 p-2">' . $idValue . ' <span class="toCopy small float-end border rounded-2 btn-small btn-primary" style="padding: 2px;" data-bs-toggle="tooltip" data-bs-title="Click to copy code to clipboard">Copy</span></div>';
                $string .=  '<div style = "display: none;" class="copyCode small border rounded p-1">&lt;svg class="icon" width="24" height="24"&gt;&lt;use href="#'.$idValue.'"&gt;&lt;/use&gt;&lt;/svg&gt;</div>';
                $string .=  "</div>\n";
                
            }
        }
        $string .= "</div>\n";

    } else {
        $string =  "Le fichier des symboles n'a pas été trouvé.";
    }

    return $string;
}