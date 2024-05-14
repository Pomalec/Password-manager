<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$pwd= $_POST["pwd"];


try {
    require_once "dbh.inc.php";
    require_once "login_model.inc.php";
    require_once "login_contr.inc.php";

    //ERROR
    $errors=[];
    if (isempty($username,$pwd,)) {
        $errors["empty_input"]="fill in all fields";
    }
  $result=get_user( $pdo, $username);
  if(is_username_wrong($result)){
    $errors["login_incorrect"]="incorrect login username";
  }
  if(!is_username_wrong($result)&&is_password_wrong($pwd, $result["pwd"])){
    $errors["login_incorrect"]="incorrect password";
  }
    require_once 'config.php';
    if ($errors) {
        $_SESSION["errors_login"]=$errors;

        /* $singupdata=[
"username"=>$username,
"email"=>$email,
$_SESSION["signup_data"]=$singupdata
        ]; */
        header("Location: ../loginpage.php");
        die();
    }

    $newSessionID=session_create_id();
    $sessionID=$newSessionID . "_".$result["id"];
    session_id($sessionID);

    $_SESSION["user_id"]=$result["id"];
    $_SESSION["user_username"]=$result["username"];

    $_SESSION['last_regeneration']=time();

    header("Location: ../MAIN.php?login=success");
    $pdo=null;
    $statement=null;
die();
} catch (PDOException $e) {
    die("Query failed: " .$e->getMessage());
}


} else{
    header("Location: ../loginpage.php");
die();
}