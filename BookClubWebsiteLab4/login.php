<?php
	include "header.php";

	//	OPENS DATABASE

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	// CHECKS IF CONNECTED, IF NOT SAY WHY NOT

	if($db->connect_error) {

		echo "Could not connect to database, because of: " . $db->connect_error;
		exit(); // STOP RIGHT HERE, NO MORE TO EXECUTE
	}

	$entered_user = "";

	$entered_pass = "";

	if (isset($_POST) && !empty($_POST)) {

	// REMOVE WHITESPACE WITH TRIM FUNCTION AND ESCAPES SPECIAL CHARACTERS FROM THE STRING WITH REAL_ESCAPE FUNCTION

		$entered_user = mysqli_real_escape_string($db, trim($_POST['username']));
		$entered_pass = mysqli_real_escape_string($db,trim($_POST['password']));

		
	}


if($entered_user && $entered_pass) {
	$query = "SELECT * FROM Users WHERE Users.username = '" . $entered_user . "' AND Users.hashed_pass = SHA('" . $entered_pass . "') LIMIT 1";
};

$stmt = mysqli_query($db, $query);

?>

		<main id="mainpage">

			<div id="pagecontainer">
			<h1>Login</h1>
				<form action="" method="post" class="Login">

					<input type="text" placeholder="Enter Username" id="username" name="username" required>

					<input type="text" placeholder="Enter Password" id="password" name="password" required>
					<button type="submit">Login</button>
					<?php
							/*while($stmt->fetch()) {

								if($entered_user == $username && $entered_pass == $password) {
									header("Location: http://localhost:8080/BookClubWebsite/admin.php");
									exit();
								}

									else {
										echo "<br><p>You entered the wrong username and/or password. Please try again or continue browsing.</p>";
									}

							};*/


							if(mysqli_num_rows($stmt) === 1) {
								header("Location: http://localhost:8080/BookClubWebsite/admin.php");
								$_POST=array();
								exit();
							}else {
									echo "<br><p>You entered the wrong username and/or password. Please try again or continue browsing.</p>";
									}
					?>
				</form>
			</div>
		</main>
<?php
	include "footer.php";
?>

	</body>
</html>