<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .members-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .member-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .member-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .member-card h3 {
            color: #333;
            margin: 10px 0;
        }
        .member-card p {
            color: #666;
            margin: 5px 0;
        }
        .no-photo {
            background-color: #ddd;
            color: #999;
            padding: 80px 20px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav style="background:#333;padding:10px 0 10px 0;margin-bottom:30px;">
        <a href="inscription.php" style="color:white;text-decoration:none;margin:0 20px;font-weight:bold;">Inscription</a>
        <a href="viewpersonne.php" style="color:white;text-decoration:none;margin:0 20px;font-weight:bold;">Voir les membres</a>
    </nav>
    <h1>📋 Registered Members</h1>
    <div class="members-container">
        <?php
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=db_digital101','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = 'SELECT id, nom, prenom, login, photo FROM personne ORDER BY id DESC';
            $stmt = $pdo->prepare($req);
            $stmt->execute();
            $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($membres) > 0){
                foreach($membres as $membre){
                    echo '<div class="member-card">';
                    if($membre['photo'] && file_exists($membre['photo'])){
                        echo '<img src="' . $membre['photo'] . '" alt="Photo">';
                    } else {
                        echo '<div class="no-photo">No Photo</div>';
                    }
                    echo '<h3>' . htmlspecialchars($membre['prenom']) . ' ' . htmlspecialchars($membre['nom']) . '</h3>';
                    echo '<p><strong>Login:</strong> ' . htmlspecialchars($membre['login']) . '</p>';
                    echo '<p><small>ID: #' . $membre['id'] . '</small></p>';
                    echo '<form method="get" action="delete_user.php" onsubmit="return confirm(\'Are you sure you want to delete this user?\');" style="margin-top:10px;">';
                    echo '<input type="hidden" name="id" value="' . $membre['id'] . '">';
                    echo '<button type="submit" style="background:#e74c3c;color:white;border:none;padding:8px 16px;border-radius:4px;cursor:pointer;">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<p style="grid-column: 1/-1; text-align: center;">No members registered yet</p>';
            }
        } catch(PDOException $e){
            die("Error: " . $e->getMessage());
        }
        ?>
    </div>
</body>
</html>