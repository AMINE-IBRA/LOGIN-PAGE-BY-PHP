<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Cible</title>
</head>
<body>
    <?php
        $prenom = $_GET['prenom'];
        $age = $_GET['age'];

        echo "Bonjour $prenom, vous avez $age ans<br>";
        echo "<a href=ex.php?prenom=".$prenom."&age=".$age.">Retour</a>";
    ?>
</body>
</html>