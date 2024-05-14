<?php

declare(strict_types=1);
function add_input(){
    echo '<input type="text" id="username"  name="username" placeholder="username" id="username">';
    echo '<label for="password">Password:</label>';
    echo '<input type="password" id="password" name="pwd" placeholder="password">';
if(isset($_SESSION["add_acc_data"]["site"])&&!isset($_SESSION["errors_adding"]["site_taken"])){
echo '<label for="website">Website:</label>
<input type="text" id="website" name="site" placeholder="site" value="'.$_SESSION["add_acc_data"]["site"] .' ">';

}else{
    echo '<label for="website">Website:</label>
    <input type="text"  id="website" name="site" placeholder="site">';
}



/* if(isset($_SESSION["signup_data"]["email"])&&!isset($_SESSION["errors_signup"]["invalid_email"])&&!isset($_SESSION["errors_signup"]["email_taken"])){
    echo '<input type="text" name="email" placeholder="email" value="'.$_SESSION["signup_data"]["emial"] .' ">';
    
    }else{
        echo '<input type="text" name="email" placeholder="email">';
    } */
}
function check_add_errors(){
    if(isset($_SESSION['errors_adding'])){
$errors=$_SESSION['errors_adding'];

foreach($errors as $error){
echo '<p class="form-error">'.$error.'</p>';
}
unset($_SESSION['errors_adding']);
    }else if(isset($_GET["add"])){

echo '<p class="form-success">adding account success! </p> ';
    }
}