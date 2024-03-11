 <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Page de Connexion</title>
            <link rel="stylesheet" href="styles/styles-auth.css">
        </head>
        <body>
            <div class="container">
                <h1>Page de Connexion QRElec</h1>
                <img src="images/logo_elec.webp"/>
                <form method="POST" action="">
                    <label for="email">Email :</label>
                    <input type="email" id="mail" name="mail" required><br><br>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Se connecter">
                </form>
            </div>
        </body>
    </html>