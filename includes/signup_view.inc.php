<?php

declare(strict_types=1);
function signup_input(){
    echo '<div class="form-group">';
if(isset($_SESSION["signup_data"]["username"])&&!isset($_SESSION["errors_signup"]["username_taken"])){
echo '<label for="username">Username:</label>
<input type="text" id="username" name="username" placeholder="username" value="'.$_SESSION["signup_data"]["username"] .' ">  </div>';

}else{
    echo '<input type="text" id="username" name="username" placeholder="username">  </div>';
}

echo '<div class="form-group"> 
<label for="master-password">Master Password:</label>
<div class="password-input-container">
<input type="password" name="pwd" id="masterpassword" placeholder="password"> <span class="password bx bx-show" id="eyeicon"></span></div> </div>';

echo ' <div class="form-group">';
if(isset($_SESSION["signup_data"]["email"])&&!isset($_SESSION["errors_signup"]["invalid_email"])&&!isset($_SESSION["errors_signup"]["email_taken"])){
    echo '<label for="email">Email:</label> <input type="text" id ="email" name="email" placeholder="email" value="'.$_SESSION["signup_data"]["email"] .' "> </div>';
    
    }else{
        echo '<input type="text"  id ="email"  name="email" placeholder="email"> </div>';
    }
}
function check_signuperros(){
    if(isset($_SESSION['errors_signup'])){
$errors=$_SESSION['errors_signup'];
echo "<br>";
foreach($errors as $error){
echo '<p class="form-error">'.$error.'</p>';
}
unset($_SESSION['errors_signup']);
    }else if(isset($_GET["signup"])){
echo '<br>';
echo '<p class="form-success">Signup success! </p> ';
    }
}