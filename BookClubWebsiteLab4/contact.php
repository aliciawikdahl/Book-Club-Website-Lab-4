
<?php
	include "header.php";
?>
		<div id="pagecontainer">

			<main>

				<h1>Contact</h1>

				<form action="mail.php" method="POST">
					<p>Name</p> <input type="text" name="name">
					<p>Email</p> <input type="text" name="email">
					<p>Message</p><textarea name="message" rows="6" cols="25"></textarea><br />
					<input type="submit" value="Send"><input type="reset" value="Clear">
				</form>


			</main>

		</div>

<?php
	include "footer.php";
?>

	</body>
</html>