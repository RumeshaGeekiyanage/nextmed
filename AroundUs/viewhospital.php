<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "pharmacy";
	
	//Connect Database
	$conn = mysqli_connect($servername,$username,$password,$database);
	
	//Check Connection
	if(!$conn){
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	//Retrieve Data
	$sql = "SELECT * FROM hospital"; // WHERE area = '$_POST[location]'"
	//$sql = "SELECT DISTINCT username FROM user";
	$res = mysqli_query($conn , $sql);
		
	if($res){
		echo "<table border = 1>
			<tr>
			<th> Hospitlal Name </th>
			<th> Area </th>
			<th> Telephone Number </th>
			</tr>";
		while($row = mysqli_fetch_array($res)){
			echo "<tr><td>". $row['hospitalname']."</td><td>".$row['area']."</td><td>".$row['telephonenum']."</td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "Error : " . mysqli_error($conn); 
	}
	
	//Close Connection
	mysqli_close($conn);
?>