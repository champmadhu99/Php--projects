<html>
<head>
<title>Inline CSS</title>
<body>
	<h1 >Demonstration Of CSS Inline Style</h1>
	<h3 style="text-decoration: underline;
text-decorationstyle:double;
color: crimson;">Inline Styling for multiple elements</h3>

<?php
$servername ="localhost";
$username= "root";
$password = "";
$dbname="testdb";
 
 $conn = new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	 die("connection faild: "  .$conn->connect_error);
 }
 echo "<h1>Connected successfully </h1>";
?>
