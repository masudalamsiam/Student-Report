<!DOCTYPE html>
<html lang="en">
<head>
  <title>Question 3/three</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="./bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
  <script src="./bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <style>
      .cst3619_highLight{
          background-color:pink;
      }
	  .cst3620_highLight{
          background-color:green;
      }
      .width{
         xwidth:80%;
      }
  </style>

</head>
<body>
<div class="container" style="width:800px">
  <h2>Student Report</h2>
  <p>List of student from 2016</p>            
  <?php include_once "./q3.include/menu.php" ?>
  <table class="table width" >
    <thead>
      <tr>
        <th>exam number</th>
        <th>average<br />description</th>
        <th>county</th>
        <th>studentId</th>
        <th>age</th>
      </tr>
    </thead>
    <tbody>
        <?php
		  include_once "./q1.Include/ElementaryGrade.php";
  $elementaryGrade = new ElementaryGrade();
// Server Username and Password
$servername = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "examsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$country = "1=1";
$average = "1=1";
$order = "1=1";
$limit = 100;
if ($x == "*") {
	$limit = 300;

}
if ($x == "b") {
    $country = "county = 'brooklyn'";

}
if ($x == "q") {
    $country = "county = 'queens'";

}
if ($x == "x") {
    $country = "county = 'bronx'";

}
if ($x == "w") {
    $country = "county = 'westchester'";

}
if ($x == "l") {
    $country = "county = 'longisland'";

}
$exam = cGET("exam","*");
if ($exam == "e1") {
    $average = "average > 90";

}
if ($exam == "e2") {
    $average = "average > 80";

}
if ($exam == "e3") {
    $average = "average > 70";

}
if ($exam == "e4") {
    $average = "average > 60";

}
$orderby = cGET("orderby","1");

if ($orderby == "1") {
    $order = "id";

}
if ($orderby == "2") {
    $order = "average";

}
if ($orderby == "3") {
    $order = "county";

}
if ($orderby == "4") {
    $order = "studentId";

}
if ($orderby == "5") {
    $order = "age";

}


$sql = "SELECT *
        FROM students
        WHERE $country AND $average 
        ORDER by $order
        LIMIT $limit;";


	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
		$score = $row["average"];
		$sfsdf = $elementaryGrade->getLetterGrade($score);
	  $highLight = "";
	  if($sfsdf == "passing"){
	  	$highLight = "cst3620_highLight";
	  }
	  if($sfsdf == "fail"){
	  	$highLight = "cst3619_highLight";
	  }

        
?>
			<tr class= <?php echo $highLight; ?>>
				<td> <?= $row["id"] ?> </td>
				<td> <?= $row["average"].", ".$elementaryGrade->getLetterGrade($score) ?> </td>
				<td> <?= $row["county"] ?> </td>
				<td> <?= $row["studentId"] ?> </td>
				<td> <?= $row["age"] ?> </td>
			</tr> 

<?php
    }
}

else {
    echo "0 results";
}
// Close connection
$conn->close();
?>      
    </tbody>
  </table>