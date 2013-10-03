<?php
//header("Content-type: text/html; charset=utf-8");
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
if(empty($search)){
  
}

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

?>