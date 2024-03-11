<?php
session_start();
spl_autoload_register(function ($className) {
    $classNameR = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once 'src/' . $classNameR . '.php';
});

if (!isset($_SESSION['utilisateur'])) {
    session_destroy();
    header("Location: index.php");
    exit();
} else {
    if (isset($_SESSION['utilisateur'])) {
        if ($_SESSION['utilisateur']['typeUtilisateur'] != "ADMIN") {
            header("Location: index.php");
            exit();
        } else {
            ?>
            <!DOCTYPE html>
            <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Admin</title>
                    <link rel="stylesheet" href="styles/styles-admin.css">
                </head>
                <body>
                    <div class="container">
                        <div class="enligne"><img src="images/logo_elec.webp" id="logo"/>
                            <?php
                            include 'views/common/div_infos_utilisateur.php';
                            ?>
                        </div>
                        <?php
                        $action = filter_input(INPUT_GET, "action");
                        if (!isset($action)) {
                            $action = "listeUtilisateurs";
                        }
                        $adminController = new controllers\AdminController($action);
                        ?>
                    </div>
                </body>
            </html>
            <?php
        }
    } else {
        header("Location: index.php");
    }
}