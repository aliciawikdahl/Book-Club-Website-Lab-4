<?php
	include "header.php";

	//	OPENS DATABASE

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	// CHECKS IF CONNECTED, IF NOT SAY WHY NOT

	if($db->connect_error) {

		echo "Could not connect to database, because of: " . $db->connect_error;
		exit(); // STOP RIGHT HERE, NO MORE TO EXECUTE
	}
?>

		<main id="mainpage">

			<div id="pagecontainer" class="admin">
				<h1>Admin</h1>
				<form action="" method="post" class="Upload" enctype="multipart/form-data">
					<input type="file" id="image" name="image" placeholder="Choose your file"/>
    				<button type="submit" value="Upload Image" name="submit">Upload</button>
    			</form>

    			<?php

    				define('uploadpath', '/opt/lampp/htdocs/BookClubWebsite/Images/');

    				$OK = 1;

    				$errors = array();

    				if(isset($_POST['submit'])) {

    					$imagefile = basename($_FILES['image']['name']);
    					$target = uploadpath . $imagefile;
    					$file_type = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    					$imagesize = $_FILES["image"]["size"];
    					$imagetemp = $_FILES["image"]["tmp_name"];

    					// SETS ERROR ARRAY

    					unset($errors);
    					$errors = array();

    					$check = getimagesize($_FILES["image"]["tmp_name"]);

    					if($check == false) {
    						array_push($errors, "File is not an image. ");
    						$OK = 0;

    					};


	    				if (file_exists($target)) {
	    					array_push($errors, "File already exists. ");
	    					$OK = 0;
	    				};
	    				

	    				if ($imagesize > 2000000) {
	    					array_push($errors, "File is too large. ");
	    					$OK = 0;
	    				};

	    				if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
	    					array_push($errors, "Wrong file type, only JPG, JPEG, and PNG files are allowed. ");
	    					$OK = 0;
						};

						if ($OK == 0) {

							for($x = 0; $x < count($errors); $x++) {
  									echo $errors[$x];
    								echo "<br>";
							};

						} else {

	    					if (move_uploaded_file($imagetemp, $target)) {

	    							$query = "INSERT INTO Images (Images.id, Images.file) VALUES (0, '$imagefile')";

									$stmt = $db->prepare($query);
									$stmt->execute();

									echo "The file ". $imagefile . " has successfully been uploaded!";

									unset($_POST);
	    						};
	    					};

    				};

    			?>

			</div>
		</main>
<?php
	include "footer.php";
?>

	</body>
</html>