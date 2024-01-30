<?php
$dsn = 'mysql-the-sense.alwaysdata.net';
$user = 'the-sense';
$password = 'the-sense-dr01te';

$pdo = new PDO($dsn, $user, $password);


if(...){
    $mail = $_POST['mail']

    $stmt = $pdo->prepare('SELECT id FROM USERS WHERE username = :mail');
    $stmt->bindparam(':mail', $mail);
    $stmt->execute()
    
    $tab = $stmt->fetch(PDO::FETCH_ASSOC);

    if($tab){
        $stmt = $pdo->prepare('SELECT room, mode, players, date FROM USERS WHERE id_USERS = :id');
        $stmt->bindparam(':id', $tab);
        $stmt->execute()

        $histo = $stmt->fetch(PDO::FETCH_ASSOC);
        echo 'histo'
    } else{
        echo ''
    }
}
?>