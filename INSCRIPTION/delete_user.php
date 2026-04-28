<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=db_digital101','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Get photo path before deleting
        $stmt = $pdo->prepare('SELECT photo FROM personne WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $user['photo'] && file_exists($user['photo'])) {
            unlink($user['photo']); // Delete photo file
        }
        // Delete user
        $stmt = $pdo->prepare('DELETE FROM personne WHERE id = ?');
        $stmt->execute([$id]);
        header('Location: viewpersonne.php?deleted=1');
        exit();
    } catch (PDOException $e) {
        header('Location: viewpersonne.php?deleted=0');
        exit();
    }
} else {
    header('Location: viewpersonne.php');
    exit();
}
