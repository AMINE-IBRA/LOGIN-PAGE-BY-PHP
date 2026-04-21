<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <style>
        body {
            margin: 0;
            padding: 40px;
            background-color: #f0f0f0;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        
        form {
            background-color: white;
            display: inline-block;
            padding: 30px;
            border-radius: 5px;
        }
        
        input, button {
            display: block;
            width: 250px;
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <form method="post" action="actionInscription.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Inscription</legend>
            <input type="text" name="nom" placeholder="Votre nom" value="" required><br>
            <input type="text" name="prenom" placeholder="Votre prénom" value="" required><br>
            <input type="text" name="login" placeholder="Votre login" value="" required><br>
            <input type="password" name="psw" placeholder="Mot de passe" required><br>
            <input type="password" name="cpsw" placeholder="Confirmer le mot de passe" required><br>
            <input type="file" name="photo" accept="image/*" required><br>
            <button type="submit" name="inscription">S'inscrire</button>
        </fieldset>
    </form>

    <?php
    if(isset($_GET['err'])){
        switch ($_GET['err']) {
            case 1:
                echo "✓ Données bien insérées!";
                break;
            case 2:
                echo "✗ Données non insérées!";
                break;
            case 3:
                echo "✗ Les mots de passe ne correspondent pas!";
                break;
            case 4:
                echo "✗ Merci de renseigner tous les champs!";
                break;
        }
    }
    ?>
</body>
</html>