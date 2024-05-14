<?php

declare(strict_types=1);

function isempty(string $username,string $password,string $email){
if (empty($username)||empty($password)||empty($email)) {
    return true;
}
else{
    return false;
}
}

function isemailvalid(string $email){
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
return true;
}else{
return false;
}

}
function isusernametaken(object $pdo,string $username){
    if(getuser( $pdo, $username)){
    return true;
    }else{
    return false;
    }
    
    }
function isemailtaken(object $pdo,string $email){
        if(getemail( $pdo, $email)){
        return true;
        }else{
        return false;
        }
        
        }


function create_user(object $pdo,string $username,string $pwd,string $email){
    $query ="INSERT INTO users(username,pwd,email) VALUES (:username,:pwd,:email);";

    $stmt=$pdo->prepare($query);
    $options=[
        'cost'=>12
    ];
    $hashedpwd=password_hash($pwd,PASSWORD_BCRYPT,$options);
$stmt->bindParam(":username",$username);
$stmt->bindParam(":pwd",$hashedpwd);
$stmt->bindParam(":email",$email);
    $stmt->execute();

}

    