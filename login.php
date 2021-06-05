<?php
include 'includes/sub_header.php';
?>


<div class="container-fluid mb-5">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

			<div style="background-color: rgb(211, 17, 66)" class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form action="includes/login.inc.php" method="post">
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input name="username" type="text" placeholder="Username/Email" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input name="password" type="password" placeholder="Password" required>
						</div>
						<div class="text-left mb-3 text-center">
							<button style="background-color: #e9a56d" name="submit" type="submit" class="btn">Login</button>
						</div>
						<div style="color: #fccc00">Don't have an account
							<a href="registration.php" class="login-link">Create an account here</a>
						</div>
					</form>
				</div>
			</div>
			<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Fill in all fields</p>";
					} else if ($_GET["error"] == "wronglogin") {
						echo "<p>Incorrect login information</p>";
					} else if ($_GET["error"] == "wrongpassword") {
						echo "<p>Password incorrect</p>";
					} else if ($_GET["error"] == "none") {
						echo "<p>You have signed up</p>";
					}
				}
				?>  
		</div>
	</div>

<?php
include 'includes/footer.php'
?>