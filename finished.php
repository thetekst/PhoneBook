<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>PhoneBook</title>
	<link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/myScript.js"></script>
	<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>  
	<![endif]-->
</head>

<body>
	<div id="wrapper">
	
		<header>
			 <h1>PhoneBook</h1>
			 <!-- Содержимое хедера -->
		</header>
		
		<div id="adduser">
			<!-- Контент страницы -->
			<!--img src="images/search-field.jpg" width="334" height="53" id="pic"-->
			<p><a href="add_user.php">Add user</a></p>
		</div>
		
        <!--statusbar-->
        <div id="status-bar">
        	<div id="status-bar-content">
            <form action="ajaxAction.php" onsubmit="return false;" method="post" name="search-form" id="search-form" enctype="multipart/form-data">
                <label for="queryName">
                    <input name="queryName" id="queryID" class="radius" value="Search..." type="text" size="40"
                    		onkeyUp="searchF();"
                            onblur="if(this.value=='' || this.value=='Введите имя') this.value='Search...';"
                            onfocus="if(this.value=='Search...' || this.value=='Введите имя') this.value='';"/> 
					<button name="go" type="button" onClick="test();">Go</button>
                </label>
            </form>
            <div id="status-bar-commands">
            	<p id="welcome">Welcome, Guest</p>
                <p id="action-bar">
                <a href="#login" title="Login">Login</a>
                <a href="#sitemap" title="Sitemap">Sitemap</a>
                <a href="#license" title="License">License</a>
                </p>
            </div>
            </div>
        </div>
        <!--End statusbar-->
        
		<!--Start container-->
		<div class="container">
        
			<?php
			$search = $_POST['search-form'];
				if(empty($search)){
					require_once('appvars.php');
					require_once('connectvars.php');
					
					// Connect to the database 
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
						or die('Error connecting to MySQL server.');
					
					$query = "SELECT name, last_name, description, screenshot FROM contacts ORDER BY id";
					$data = mysqli_query($dbc, $query);
					
					  while ($row = mysqli_fetch_array($data)) {
						// Display the score data
						echo '<div class="text">';
						//Контент страницы
						
						echo '<img class="img-block" width="43" height="43" src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="' . $row['name'] . '" />';
						echo '<p class="block-paragraph">' . "\n";
						
						echo '<strong>' . $row['name'] .' ' . $row['last_name'] . '</strong><br/>';
						echo $row['description'];
						echo '</p>' . "\n";
						echo '</div>';
					  }

			  mysqli_close($dbc);
			  } else {
					echo 'форма не пустая';
				}
			 
			?>

        
        </div>
        <!--End container-->
        
        <!--Start footer-->
		<footer>
			 <small>thetekst (c)</small>
			 <!-- Содержимое футера -->
		</footer>
	</div>
</body>
</html>