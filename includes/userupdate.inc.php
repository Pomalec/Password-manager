<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$pwd= $_POST["pwd"];
$site= $_POST["site"];
$id=$_POST["userselected"];

try {
    require_once "dbh.inc.php";
    $query ="UPDATE  user_accounts SET username=:username,pwd=:pwd WHERE id =:id;";

    $stmt=$pdo->prepare($query);
    $options=[
        'cost'=>12
    ];
    $hashedpwd=password_hash($pwd,PASSWORD_BCRYPT,$options);

$stmt->bindParam(":username",$username);
$stmt->bindParam(":pwd",$hashedpwd);
$stmt->bindParam(":id",$id);
    $stmt->execute();
$pdo=null;$stmt=null;
header("Location: ../MAIN.php");
die();
} catch (PDOException $e) {
    die("Query failed: " .$e->getMessage());
}


} else{
    header("Location: ../MAIN.php");

}