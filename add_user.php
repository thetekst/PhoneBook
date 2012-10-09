<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>PhoneBook</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/myScript.js"></script>
	<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>  
	<![endif]-->
</head>

<body>
  <h2>Add user</h2>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {
    // Grab the description data from the POST
    $name = $_POST['name'];
	$last_name = $_POST['last_name'];
    $description = $_POST['description'];
	$escapes = $_POST['escapes'];
    $screenshot = $_FILES['screenshot']['name'];
	//$screenshot = time() . $screenshot;
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size']; 

    if (!empty($name) && !empty($last_name) && !empty($description) && !empty($escapes) && !empty($screenshot)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0) {          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Write the data to the database
            $query = "INSERT INTO contacts VALUES (0, NOW(), '$name', '$last_name', '$description', '$escapes', '$screenshot')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Thanks for adding your new high description! It will be reviewed and added to the high description list as soon as possible.</p>';
            echo '<p><strong>Name:</strong> ' . $name . '<br />';
			echo '<strong>Last name:</strong> ' . $last_name . '<br />';
            echo '<strong>description:</strong> ' . $description . '<br />';
			echo '<strong>escapes:</strong> ' . $escapes . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="description image" /></p>';
            echo '<p><a href="finished.php">&lt;&lt; Back to high descriptions</a></p>';

            // Clear the description data to clear the form
            $name = "";
			$last_name = "";
            $description = "";
			$escapes = "";
            $screenshot = "";

            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }      else {        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to add your high description.</p>';
    }
  }
?>

  <hr />
  <form enctype="multipart/form-data" method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" onblur="validateField(this.value)" /><br />
	<label for="last_name">Last name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="<?php if (!empty($description)) echo $description; ?>" /><br />
	<label for="escapes">Escapes:</label>
    <input type="text" id="escapes" name="escapes" value="<?php if (!empty($escapes)) echo $escapes; ?>" /><br />
    <label for="screenshot">Screen shot:</label>
    <input type="file" id="screenshot" name="screenshot" />
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body> 
</html>
