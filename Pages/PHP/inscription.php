<?php
$dsn = 'mysql-the-sense.alwaysdata.net';
$user = 'the-sense';
$password = 'the-sense-dr01te';

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['name'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $stmt = $pdo->prepare('SELECT mail, password FROM USERS WHERE mail = :mail');
    $stmt->bindparam(':mail', $mail);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO `USERS`('id',`mail`, `password`, 'name') VALUES (0,:mail, :password,:name )");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        echo 'user';
    }
    else{
        echo "reset";
    }
}

?>