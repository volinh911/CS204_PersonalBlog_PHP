<?php
include_once 'includes/sub_header.php';
?>


<div class="container-fluid mb-5">
	<div class="row">
		<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

		<div class="col-lg-6 col-md-6 form-container">
			<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
				<div class="heading mb-4">
					<h4>Create an account</h4>
				</div>
				<form action="includes/signup.inc.php" method="post">
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input name="username" type="text" placeholder="Username" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input name="email" type="email" placeholder="Email Address" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input name="password" type="password" placeholder="Password" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input name="pwdrepeat" type="password" placeholder="Password Confirmation" required>
					</div>
					<div class="text-left mb-3 text-center">
						<button name="submit" type="submit" class="btn">Register</button>
					</div>
					<div style="color: #777">Already have an account
						<a href="login.php" class="login-link">Login here</a>
					</div>
				</form>
				<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Fill in all fields</p>";
					} else if ($_GET["error"] == "invalidusername") {
						echo "<p>Choose a proper username</p>";
					} else if ($_GET["error"] == "invalidemail") {
						echo "<p>Choose a proper email</p>";
					} else if ($_GET["error"] == "passworddontmatch") {
						echo "<p>Password doesn't match</p>";
					} else if ($_GET["error"] == "usernametaken") {
						echo "<p>Username exists</p>";
					} else if ($_GET["error"] == "stmtfailed") {
						echo "<p>Something went wrong!</p>";
					} else if ($_GET["error"] == "none") {
						echo "<p>You have signed up</p>";
					}
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'includes/footer.php'
?>