<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$pwd= $_POST["pwd"];
$email= $_POST["email"];

try {
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_contr.inc.php";

    //ERROR
    $errors=[];
    if (isempty($username,$pwd,$email)) {
        $errors["empty_input"]="fill in all fields";
    }
    if (isemailvalid($email)) {
        $errors["invalid_email"]="invalid email";
    }
    if (isusernametaken($pdo, $username)) {
        $errors["username_taken"]="username taken";
    }
    if (isemailtaken( $pdo, $email)) {
        $errors["email_used"]="email used";
    }
    require_once 'config.php';
    if ($errors) {
        $_SESSION["errors_signup"]=$errors;

        $singupdata=[
"username"=>$username,
"email"=>$email,
$_SESSION["signup_data"]=$singupdata
        ];
        header("Location: ../index.php");
        die();
    }

    create_user( $pdo, $username, $pwd, $email);
    
header("Location: ../index.php?signup=success");
$pdo=null;$stmt=null;
die();
} catch (PDOException $e) {
    die("Query failed: " .$e->getMessage());
}


} else{
    header("Location: ../index.php");
die();
}