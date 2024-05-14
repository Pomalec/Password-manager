
<?php
require_once 'includes/config.php';
/* require_once 'includes/config_session.inc.php'; */
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/add_siteacc_view.inc.php';
require_once 'includes/EncryptionFunction.php';
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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Vault</title>
    <link rel="stylesheet" href="MAIN.css">
</head>

<body>
<script src="script.js"></script>
<main>
    <h3>
        <?php
output_username();
        ?>
    </h3>
    <div class="container">
      <div class="header">
        <h1 class="heading"><i class="bx bx-cube-alt"></i>All Vaults</h1>
        <button id="add-password-btn" class="add-password-btn btn-left">
          Add Password
        </button>
        <button id="change-account-btn" class="add-password-btn btn-left">
          Change Account
        </button>
        <button
          id="delete-account-btn"
          class="add-password-btn btn-left btn-right"
        >
          Delete Account
        </button>
      </div>
    </div>

<!-- LOGOUT ------------------------------------------------------------------------------------- -->
<?php
if (isset($_SESSION["user_id"])) {?>
 <h3>log out</h3>
    <form action="includes/logout.inc.php" method="post">
  
<button>logout</button>
    </form>

    <?php
}
        ?>

<!-- ADD ACCOUNTS ------------------------------------------------------------------------------------->
<?php
if (isset($_SESSION["user_id"])) {?>
   <div id="add-password-popup" class="popup-container">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Add Password</h2>
    <form action="includes/add_siteacc.php" method="post" id="add-password-formp ">
    
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
<button   >add</button>

    </form>
   
    </div>
    </div>
    <?php
}
check_add_errors();
?>
<!-- CHANGE SAVED ACCOUNTS ------------------------------------------------------------------------------------->
<?php
if (isset($_SESSION["user_id"])) {?>
<div id="change-account-popup" class="popup-container">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Change Account</h2>
        <form id="change-account-form" action="includes/userupdate.inc.php" method="post">
          <label for="delete-dropdown">Select the service:</label>
         
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
<label for="new-username">New Username:</label>
<input type="text" id="new-username" name="username" placeholder="username">
<label for="new-password">New Password:</label>
<input type="password" name="pwd" id="new-password" placeholder="password">

<button >update</button>
    </form>
    </div>
</div>
    <?php
}?>
<!-- DELETE ACCOUNT ------------------------------------------------------------------------------------>
     <?php
if (isset($_SESSION["user_id"])) {?>

<div id="delete-account-popup" class="popup-container">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Delete Account</h2>
        <p>Are you sure you want to delete your account?</p>
        <label for="delete-dropdown">Select the service:</label>

     <h3>delete account</h3>
    <form action="includes/userdelete.inc.php" method="post">
        
    <select name="siteselected" id="siteselected">
    <?php
foreach($results as $row):?>
<option value="<?php echo htmlspecialchars($row["id"]);?>">
<?php echo htmlspecialchars($row["site"]);?></option>




<?php endforeach ?>

</select>
<button  id="confirm-delete"  >delete</button>
</div>
    </div>
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



    <section class="container">
<H3>search result</H3>

<?php
if(empty($results)){
echo "<div>";
echo "<p>no results</p>";
echo "</div>";
}
else{
foreach($results as $row){
$dectext =  decryptText($row["pwd"], 'rand');
echo "<h4>".htmlspecialchars($row["username"])."</h4>";
echo "<p>". htmlspecialchars($dectext)."</p>";
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