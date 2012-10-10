<?php
header("Content-type: text/html; charset=utf-8");
if(isset($_POST['search'])) {
	$search = $_POST['search'];
} else echo 'не существует';
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
if(empty($search)){
  $query = "SELECT name, last_name, description, screenshot FROM contacts ORDER BY id";
}

require_once('appvars.php');
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or die('Error connecting to MySQL server.');
$query = "SELECT * FROM contacts WHERE name LIKE '$search%' OR last_name LIKE '$search%' ORDER BY id";
$data = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($data);
if($row){
	do {
	 // Display the score data
	echo '<div class="text">';
	//Контент страницы
	
	echo '<img class="img-block" width="43" height="43" src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="' . $row['name'] . '" />';
	echo '<p class="block-paragraph">' . "\n";
	
	echo '<strong>' . $row['name'] .' ' . $row['last_name'] . '</strong><br/>';
	echo $row['description'];
	echo '</p>' . "\n";
	echo '</div>';
   }while($row = mysqli_fetch_array($data));
}
else{
   echo "Нет результатов";
}

mysqli_close($dbc);
?>