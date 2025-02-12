
# IconatoR

IconatoR est un projet qui permet de créer facilement une collection d'icônes au format SVG et de mettre en place une infrastructure 
pour les gérer et les afficher dans votre projet.
Ce projet est idéal pour les développeurs et les designers qui souhaitent intégrer des icônes SVG dans leurs projets rapidement et efficacement.

## Fonctionnalités

- Ajouter une icône
- Génére les fichiers contenant les icônes
- Copier le contenu d'icônes SVG dans le presse-papier en un clic.
- Supporte plusieurs icônes et éléments de copie sur une même page.

## Installation

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/akelleter/IconatoR.git
    ```

2. Ouvrez le fichier `index.php` dans votre navigateur pour voir le projet en action.

## Utilisation

Il existe deux fichiers pour stocker des icônes utiles dans les applications :

    - icons-common.php : Contient les icônes communes à toutes les applications, les icônes génériques
    - icons/icons-application.php : Contient les icônes spécifiques à l'application en cours

Pour ajouter une nouvelle icône dans un des deux fichiers vous devez coller le code des balise "SVG" que vous avez copié préalablement dans le presse papier :
Exemple avec une icône Bootstrap : [Bag](https://icons.getbootstrap.com/icons/bag/)

```                          
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
    </svg>
```

Après voir collé ces lignes dans le bon fichier, vous devez effectuer quelques modifications

    Modifier le nom des balises "svg" en "symbol"
    Ajouter un attribut id="myID", utilisé pour l'affichage
    Supprimer les attributs qui ne sont pas nécessaires
    Enregistrer le fichier
    Regénérer les fichiers ".svg" qui contiennent les icônes en utilisant le bouton "Generate Icons Files".

Exemple du code après nettoyage :
```                           
    <symbol id="bag" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
    </symbol> 
```

### Code à utiliser pour afficher une icône

Dans l'application, il suffit de cliquer sur le bouton copy , pour copier le code de l'icône dans le presse-papier.

Ci-dessous, un exemple de code :

```                           
 <svg class="icon" width="24" height="24">
    <use xlink:href="#bag"></use>
 </svg>
```

## Infrastructure à mettre en place dans votre projet

Le chargement des fichiers ".svg" est réalisé grâce à l'exécution d'un code JavaScript sur toutes les pages de l'application.
Enregistrer ce code dans un fichier JavaScript que vous chargerez ensuite sur vos pages.

```
// Charger le fichier SVG et insérer les symboles dans le DOM
fetch('your-path-file/icons-common.svg')
    .then(response => response.text())
    .then(data => {
        document.getElementById('svg-icons-common').innerHTML = data;
    })
    .catch(error => console.error('Erreur lors du chargement du fichier : icons-common.svg:', error));
    
fetch('your-path-file/icons-application.svg')
    .then(response => response.text())
    .then(data => {
        document.getElementById('svg-icons-application').innerHTML = data;
    })
    .catch(error => console.error('Erreur lors du chargement du fichier : icons-application.svg:', error));
```

La préparation à l'affichage est effectuée par la présence de deux "div" dans le code HTML des pages de votre projet.

```
<div id="svg-icons-common" style="display: none;"></div>
<div id="svg-icons-application" style="display: none;"></div>
```

