<?php
if(isset($_POST['inscription'])){
    $nom = trim($_POST['nom']); // trim permet de supprimer les espaces au début et à la fin
    $prenom = trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $psw = $_POST['psw'];
    $cpsw = $_POST['cpsw'];
    $photo = null;
    
    // Handle photo upload
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
        $PHOTO_dir = 'LES-PHOTOS-STOCKETS/';
        if(!is_dir($PHOTO_dir)){
            mkdir($PHOTO_dir, 0755, true);
        }
        
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        
        if(in_array(strtolower($ext), $allowed_ext)){
            $filename = uniqid('photo_') . '.' . $ext;
            $filepath = $PHOTO_dir . $filename;
            
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)){
                $photo = $filepath;
            }
        }
    }

    if(!empty($nom) 
        && !empty($prenom) 
        && !empty($login) 
        && !empty($psw) 
        && !empty($cpsw))
    {
        if($psw === $cpsw){
            $pdo = new PDO('mysql:host=localhost;dbname=db_digital101', 'root', '');
            $req = 'insert into personne(nom,prenom,login,psw,photo) values (?,?,?,?,?);';
            $stmt = $pdo->prepare($req);
            $resultat = $stmt->execute(array($nom, $prenom, $login, md5($psw), $photo));

            if($resultat){
                header('Location:inscription.php?err=1');
            } else {
                header('Location:inscription.php?err=2');
            }
        } else {
            // psw != cpsw
            header('Location:inscription.php?err=3');
        }
    } else {
        header('Location:inscription.php?err=4');
    }
}
?>
