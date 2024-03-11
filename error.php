<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'erreur</title>
        <link rel="stylesheet" href="styles/styles-error.css">
    </head>
    <body>
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                $message = $_SESSION['error']['message'];
                echo "<h1>Erreur</h1>";
                echo "<p>$message</p>";
            } else {
                // Si aucun message d'erreur n'est passé, affiche un message par défaut
                echo "<h1>Erreur</h1>";
                echo "<p>Une erreur est survenue.</p>";
            }
            ?>

            <?php
            // Vérifie si l'URL de redirection est passée en paramètre
            if (isset($_SESSION['error'])) {
                $redirection = $_SESSION['error']['redirection'];
                echo "<a href='$redirection'><button class='btn'>Valider</button></a>";
            } else {
                // Si aucune URL de redirection n'est passée, affiche un bouton de retour par défaut
                echo "<a href='javascript:history.back()'><button class='btn'>Retour</button></a>";
            }
            unset($_SESSION['error']) ;
            ?>
        </div>
    </body>
</html>


