
<?php

if(isset($_POST["submit"]))
{
$f=fopen("mytext.txt","w+");


$err1="";
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
if (!empty($_POST["email"]))
    {
        $email = $_POST["email"];

        if(preg_match($regex, $email)){
        $err1="valid" ; 
        fwrite($f,$_POST["email"]);
    }
    else
    {
          $err1="invalid";    
    }
}
$err="";
$regex='/^[a-zA-z]/';
if (!empty($_POST["username"])) {
    $name = $_POST["username"];
   
 if(preg_match($regex, $name)){
   $err="valid" ; 
   fwrite($f,$_POST["username"]);
 }else{
    $err="invalid";    
 }}

 $err2="";
 $regex='/^[1-9]$/';
 if (!empty($_POST["password"])) {
    $pass = $_POST["password"];
    fwrite($f,$_POST["password"]);
    if(preg_match($regex, $pass) && strlen($pass)>=8){
    $err2="valid" ; 
    }else{
    $err2="invalid";    
  }}

  $err3="";
  if(!empty($_POST["password2"]))
  {
    if($_POST["password2"]==$_POST["password"])
    {  
        $err3="matching" ;
     }
    else
    {  
        $err3="not matching";
    }
 }

 fclose($f);
 
}
else{
    $err="";  $err1="";  $err2="";  $err3="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            <?php  echo $err?>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <?php  echo $err1?>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password">
            <?php  echo $err2?>
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type="text" name="password2" id="password2">
            <?php  echo " "?>
        </div>
       
        <button type="submit">Register</button>
        
    </form>
</main>
</body>