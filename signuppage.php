<?php
require_once 'includes/config.php';
/* require_once 'includes/config_session.inc.php'; */
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/add_siteacc_view.inc.php';
?>
<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
if (isset($_SESSION["user_id"])) {
    $usersearch=$_SESSION["user_id"];
    try {
        require_once "includes/dbh.inc.php";
        $query ="SELECT * FROM user_accounts WHERE users_id=:usersearch ";
    
        $stmt=$pdo->prepare($query);
    
    $stmt->bindParam(":usersearch",$usersearch);
   
    
        $stmt->execute();
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo=null;$stmt=null;
    
    
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Style.signup.css">
    <title>Sign up | Web Manager </title>
</head>
<body>
<main>
    <h3>
        <?php
output_username();
        ?>
    </h3>

    <div class="container">
        <h1 class="heading"><i class="bx bx-cube-alt"></i>Password Defender</h1>
        <p class="subheading">The Password Manager</p>
        <ul class="bullet-points">
            <li>One Password</li>
            <li>Secure all passwords</li>
            <li>Save and fill passwords</li>
            <li>Operate Passwords</li>
            <li>Generate Passwords</li>
        </ul>
    </div>

<!-- SIGNUP--------------------------------------------------------------------------------------- -->

   

<div class="form-container">
        <form action="includes/formhandler.php" method="post">
        <?php
signup_input();
?>
            
            <button type="submit">Create Account</button>
            <div class="login-grp">
                <p>Already have an account? <a href="loginpage.php" class="link to 2ND PAGE ">Log in</a> </p>

            </div>
        </form>
        <?php
check_signuperros();
?>
    </div>

    <script>
        let eyeicon = docoment.getElementById("eyeicon");
        let masterpassword = docoment.getElementById("master-password");
        let retypepassword = docoment.getElementById("retypepassword");
        eyeicon.onclick = function(){
            if(password.type == "password"){
                password.type = "text";
            }else{
                password.type = "password";
            }
        }
    </script>
</body>
</html>



<!-- ADD ACCOUNTS ------------------------------------------------------------------------------------->
<?php
if (isset($_SESSION["user_id"])) {?>
    <h3>Add site account</h3>
    <form action="includes/add_siteacc.php" method="post">
    
    <?php
add_input();
?>
    

        <!-- <select name="userselected" id="userselected">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select> -->
<!-- <input type="text" name="username" placeholder="username">
<input type="password" name="pwd" placeholder="password">
<input type="text" name="site" placeholder="site"> -->
<button >add</button>
    </form>
    <?php
}
check_add_errors();
?>
<!-- CHANGE SAVED ACCOUNTS ------------------------------------------------------------------------------------->
<?php
if (isset($_SESSION["user_id"])) {?>
    <h3>change account</h3>
    <form action="includes/userupdate.inc.php" method="post">
    

    <select name="userselected" id="userselected">
    <?php
foreach($results as $row):?>
<option value="<?php echo htmlspecialchars($row["id"]);?>">
<?php echo htmlspecialchars($row["site"]);?></option>




<?php endforeach ?>

</select>

        <!-- <select name="userselected" id="userselected">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select> -->
<input type="text" name="username" placeholder="username">
<input type="password" name="pwd" placeholder="password">

<button >update</button>
    </form>
    <?php
}?>
<!-- DELETE ACCOUNT ------------------------------------------------------------------------------------>
     <?php
if (isset($_SESSION["user_id"])) {?>
     <h3>delete account</h3>
    <form action="includes/userdelete.inc.php" method="post">
        
    <select name="siteselected" id="siteselected">
    <?php
foreach($results as $row):?>
<option value="<?php echo htmlspecialchars($row["id"]);?>">
<?php echo htmlspecialchars($row["site"]);?></option>




<?php endforeach ?>

</select>
<button >delete</button>
</form>
<?php } ?>
<!-- <input type="text" name="username" placeholder="username">
<input type="password" name="pwd" placeholder="password"> -->


  

<!-- SEARCH SAVED ACCOUNT-------------------------------------------------------------------------------------------- -->
<?php
if (isset($_SESSION["user_id"])) {?>
    <h3>search account</h3>
    <form class="searchform" action="search.php" method="post">
   <label for="search">search for account</label>     
<input id="search"  type="text" name="sitesearch" placeholder="SEARCH SITE..">


<button >search</button>
    </form>
<br>
    <table>
    <tr>
        
     <!--    <th>username</th>
        <th>password</th>
        <th>site</th>
        <th>date</th>
         -->

    </tr>
    <?php
}?>
<!-- SHOW SAVED ACCOUNT-------------------------------------------------------------------------------------------- -->
<?php
if (isset($_SESSION["user_id"])) {
/* $usersearch=$_SESSION["user_id"];
    try {
        require_once "includes/dbh.inc.php";
        $query ="SELECT * FROM user_accounts WHERE users_id=:usersearch ";
    
        $stmt=$pdo->prepare($query);
    
    $stmt->bindParam(":usersearch",$usersearch);
   
    
        $stmt->execute();
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo=null;$stmt=null;
    
    
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    } */
    
?>



    <section>
<H3>search result</H3>

<?php
if(empty($results)){
echo "<div>";
echo "<p>no results</p>";
echo "</div>";
}
else{
foreach($results as $row){
echo "<h4>".htmlspecialchars($row["username"])."</h4>";
echo "<p>". htmlspecialchars( $row["pwd"])."</p>";
echo "<p>". htmlspecialchars( $row["site"])."</p>";
echo "<p>".htmlspecialchars($row["created_at"])."</p>";
echo "</div>";
}

}
}
?>
</section>


</table>
</main>
</body>
</html>