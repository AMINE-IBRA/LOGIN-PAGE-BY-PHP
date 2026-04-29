<?php
session_start();
$error = '';
if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    $psw = $_POST['psw'];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=db_digital101','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT * FROM personne WHERE login = ? AND psw = ?');
        $stmt->execute([$login, md5($psw)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'login' => $user['login'],
                'photo' => $user['photo']
            ];
            header('Location: viewpersonne.php');
            exit();
        } else {
            $error = 'Login ou mot de passe incorrect!';
        }
    } catch (PDOException $e) {
        $error = 'Erreur de connexion à la base de données!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <style>
        body { background: #f0f0f0; font-family: Arial, sans-serif; text-align: center; padding: 40px; }
        form { background: #fff; display: inline-block; padding: 30px; border-radius: 5px; }
        input, button { display: block; width: 250px; padding: 10px; margin: 10px auto; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #4CAF50; color: #fff; font-weight: bold; cursor: pointer; }
        button:hover { background: #45a049; }
        .error { color: #e74c3c; margin-bottom: 10px; }
        nav { background:#333;padding:10px 0 10px 0;margin-bottom:30px; }
        nav a { color:white;text-decoration:none;margin:0 20px;font-weight:bold; }
    </style>
</head>
<body>
    <nav>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <a href="viewpersonne.php">Voir les membres</a>
    </nav>
    <form method="post" action="connexion.php">
        <h2>Connexion</h2>
        <?php if($error) echo '<div class="error">'.$error.'</div>'; ?>
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="psw" placeholder="Mot de passe" required>
        <button type="submit" name="login">Se connecter</button>
    </form>
</body>
</html>
