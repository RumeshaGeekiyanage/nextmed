<?php
$dbhost="localhost";
$dbuser="User";
$dbpassword="abc123";
$dbname="project1";

//function to connect to the database
$db = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

$email=$_REQUEST["email"];
$password=$_REQUEST["password"];

//dealing with scripting attacks(unwanted html)
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);


//deal with sql injection attacks
//$email = quote_smart($email, $db);
//$password = quote_smart($password, $db);


$sql="SELECT * FROM signup where Email='$email' AND Password='$password'";
$result = mysqli_query($db,$sql);



if(mysqli_num_rows($result)==1){ //Each entry is unique so the number of rows returned from the db table should be 1
    session_start();          //starting a session if login is successful
    $_SESSION['login']='1'; //creating a session variable
	echo "Success";
    //header('location:/../testing/indexreg.htm');
    
    
}

else{
    echo "Failed";
    session_start(); //starting a session if login is successful
    $_SESSION['login']=''; //unsucce
    
}














?>