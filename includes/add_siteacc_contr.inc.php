<?php

declare(strict_types=1);

function isempty(string $username,string $password,string $site){
if (empty($username)||empty($password)||empty($site)) {
    return true;
}
else{
    return false;
}
}

function issitetaken(object $pdo,string $site){
    if(getsite( $pdo, $site)){
    return true;
    }else{
    return false;
    }
    
    }

function create_user(object $pdo,string $username,string $pwd,string $site){
    $query ="INSERT INTO user_accounts(username,pwd,site,users_id) VALUES (:username,:pwd,:site,:id);";

    $stmt=$pdo->prepare($query);
    $options=[
        'cost'=>12
    ];

    $encryptedPWD=encryptText($pwd,'rand');
$stmt->bindParam(":username",$username);
$stmt->bindParam(":pwd",$encryptedPWD);
$stmt->bindParam(":site",$site);
$stmt->bindParam(":id",$_SESSION["user_id"]);
    $stmt->execute();

}

    