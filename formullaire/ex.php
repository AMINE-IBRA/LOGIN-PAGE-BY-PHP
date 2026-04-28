<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <form action="pageCible.php" method="get">
        <input type="text" name="prenom" placeholder="Votre prénom" 
               value="<?php if(isset($_GET['prenom'])) echo $_GET['prenom'];?>">
        <input type="text" name="age" placeholder="Votre age" 
               value="<?php if(isset($_GET['age'])) echo $_GET['age'];?>">
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</body>
</html>