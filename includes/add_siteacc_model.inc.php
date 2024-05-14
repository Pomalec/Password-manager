<?php

declare(strict_types=1);
function getsite(object $pdo,string $site){
$query="SELECT site FROM user_accounts WHERE site= :site AND users_id=:id";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":site",$site);
$stmt->bindParam(":id",$_SESSION["user_id"]);

    $stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}

