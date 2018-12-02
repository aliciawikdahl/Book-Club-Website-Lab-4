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

			<div id="pagecontainer" class="gallery">
				<h1>Gallery</h1>

				<a href="http://localhost:8080/BookClubWebsite/login.php" class="button">Login</a>

				<div class="galleryimages">
				<?php

					define('uploadpath', 'Images/');

					$query = "SELECT * FROM Images";

					$stmt = $db->prepare($query);
					$stmt->bind_result($imageid, $imagefile );
					$stmt->execute();

					while($stmt->fetch()) {

							echo "<td><img src='" . uploadpath . $imagefile . "' alt='Gallery Image' /></td></tr>";
						
					};

				?>
				</div>
			</div>
		</main>
<?php
	include "footer.php";
?>

	</body>
</html>