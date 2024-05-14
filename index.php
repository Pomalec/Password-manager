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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Defender</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <img src="logo.png">
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='PasswordGenerator/PasswordGeneratorPage.html'>Generate Password</a></li>
                <li><a href='SecureYourPasswordPage/SecurePassInfo.html'>How to Secure your Password</a></li>
                <li><a href='loginpage.php'>Login</a></li>
                <li><a href='signuppage.php'>Sign Up</a></li>
            </ul>
        </div>
    </div>
    <div class="gradient-background">
        <div class="title">
            <h1>Join PassDefender now!</h1>
            <h2>These are some of our features:</h2>
        </div>
        <div class="boxes-container">
            <div class="box box-left">
                <h2>Password Generator</h2>
                <p>Our password generator creates passwords that are incredibly hard for hackers to crack!</p>
                <img src="generator.png" alt="password generator Image">
            </div>
            <div class="box box-left">
                <h2>Stop having to remember your passwords!</h2>
                <p>A lot of bad password practices stem from the fact that we have to remember them all. Use PassDefender to generate and store top-quality passwords safely! This means no reusing passwords, which makes you less vulnerable to cyber attacks.</p>
                <img src="remeberpass.png" alt="remember password Image">
            </div>
            <div class="box box-right">
                <h2>Secure Password Storage</h2>
                <p>Your passwords are stored securely using the SHA-256 algorithm. They are also encrypted in our database using the AES symmetric encryption algorithm to further secure your passwords!</p>
                <img src="hashing.png" alt="Secure Password Storage Image">
            </div>
        </div>
    </div>
</body>
</html>