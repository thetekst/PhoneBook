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
            <form action="" onsubmit="return false;" method="post" name="search-form" id="search-form" enctype="multipart/form-data">
                
                    <input name="queryName" id="queryID" value="Type your text here..." type="text"
                    		onkeyUp="searchF();"
                            onblur="if(this.value=='') this.value='Type your text here...';"
                            onfocus="if(this.value=='Type your text here...') this.value='';"/>
            </form>
            <div id="status-bar-commands">
                <p id="action-bar">
                <a href="#login" title="All">All</a>
                <a href="#sitemap" title="Phone">Phone</a>
                <a href="#license" title="Facebook">Facebook</a>
                </p>
            </div>
            </div>
        </div>
        <!--End statusbar-->
        
		<!--Start container-->
		<div class="container">
        
        <!-- Подгружаем контакты из БД AJAX'ом -->
			<?php
				require_once('ajaxAction.php');
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