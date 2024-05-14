<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
/* $username=$_POST["username"];
$pwd= $_POST["pwd"]; */
$id=$_POST["siteselected"];

try {
    require_once "dbh.inc.php";
    $query ="DELETE FROM user_accounts WHERE id=:id; ";

    $stmt=$pdo->prepare($query);

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