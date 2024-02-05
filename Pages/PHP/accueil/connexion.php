<?php
$dsn = 'mysql-the-sense.alwaysdata.net';
$user = 'the-sense';
$password = 'the-sense-dr01te';

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['mail']) && isset($_POST['password'])){
    $mail = $_POST['mail']
    $password = $_POST['password']

    $stmt = $pdo->prepare('SELECT mail, password FROM USERS WHERE username = :mail');
    $stmt->bindparam(':mail', $mail);
    $stmt->execute()
    
    $tab = $stmt->fetch(PDO::FETCH_ASSOC);

    if(tab){
        if (password_verify($mdp, $tab['password'])){
            echo 'user' ;
        }else{
            echo 'reset';
        }
    }else{
        echo 'reset' ;
    }
    
}

?>