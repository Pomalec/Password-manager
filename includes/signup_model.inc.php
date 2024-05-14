<?php

declare(strict_types=1);
function getuser(object $pdo,string $username){
$query="SELECT username FROM users WHERE username= :username;";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":username",$username);

    $stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}
function getemail(object $pdo,string $email){
    $query="SELECT username FROM users WHERE email= :email;";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    
        $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    }
function set_user(object $pdo,string $username,string $pwd,string $email){
        
    }
    

