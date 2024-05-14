<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$pwd= $_POST["pwd"];
$site= $_POST["site"];

try {
    require_once "dbh.inc.php";
    require_once "add_siteacc_model.inc.php";
    require_once "add_siteacc_contr.inc.php";
    require_once "EncryptionFunction.php";

    //ERROR
    $errors=[];
    if (isempty($username,$pwd,$site)) {
        $errors["empty_input"]="fill in all fields";
    }
    if (issitetaken($pdo,$site)) {
        $errors["site_taken"]="there is already an account for this site";
    }
  
    require_once 'config.php';
    if ($errors) {
        $_SESSION["errors_adding"]=$errors;

        $add_acc_data=[
"username"=>$username,
"site"=>$site,
$_SESSION["add_acc_data"]=$add_acc_data
        ];
        header("Location: ../MAIN.php");
        die();
    }

    create_user( $pdo, $username, $pwd, $site);
   /*  echo '
    <script>
    function sentdata() {
        event.preventDefault();
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let website = document.getElemsentById("website").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("Username:", username);
        console.log("Password:", password);
        console.log("Website:", website);
    
    }
    </script>
    '; */
    
header("Location: ../MAIN.php?add=success");

?>

<?php
$pdo=null;$stmt=null;
die();
} catch (PDOException $e) {
    die("Query failed: " .$e->getMessage());
}


} else{
    header("Location: ../MAIN.php");
die();
}

