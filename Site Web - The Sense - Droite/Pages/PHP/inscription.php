<?php
$dsn = 'mysql-the-sense.alwaysdata.net';
$user = 'the-sense';
$password = 'the-sense-dr01te';

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];

    $stmt = $pdo->prepare('SELECT mail, password FROM USERS WHERE mail = :mail');
    $stmt->bindparam(':mail', $mail);
    $stmt->execute();
    
    $tab = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tab){
        //Si il y a une valeur dans tab alors un compte existe déjà
        echo 'reset';
    } else{
        //password_hash sert à "crypté" password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT)
        $stmt = $pdo->prepare('INSERT INTO USER (username, password, first_name, last_name) VALUES (:mail, :password, :first, :last)');
        $stmt->bindparam(':mail', $mail);
        $stmt->bindparam(':password', $password);
        $stmt->bindparam(':first', $first);
        $stmt->bindparam(':last', $last);
        $stmt->execute()
        echo 'user';
    }
}

?>