<?php

//var_dump($_SERVER["REQUEST_METHOD"]);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $site=$_POST["sitesearch"];
    
    
    
    try {
        require_once "includes/dbh.inc.php";
        $query ="SELECT username,pwd,site FROM user_accounts WHERE site=:site ";
    
        $stmt=$pdo->prepare($query);
    
    $stmt->bindParam(":site",$site);
   
    
        $stmt->execute();
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo=null;$stmt=null;
    
    
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }
    
    
    } else{
        header("Location: s../index.php");
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
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
echo "<p>". htmlspecialchars($row["pwd"])."</p>";
echo "<p>".htmlspecialchars($row["site"])."</p>";
echo "</div>";
}

}
?>
</section>
</main>
</body>
</html>