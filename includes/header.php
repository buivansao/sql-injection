<?php

if ( ! defined('SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/214f4b7d30.js" crossorigin="anonymous"></script>
	<title>Manage Students</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1>Manage Students<?= defined('SAFE_VERSION' ) ? ' (Safe version)' : '' ?></h1>
		</div>
		<div class="col-md-2">
			<?php
				if ($_SESSION['username']) { ?> 
					<form method="post" action="manageStudentMysql.php" name="login-form">
						<button type="submit" name="logout" class="btn btn-danger mt-3 pull-right">Logout</button>
					</form>		
			<?php } ?>
		</div>
	</div>
	<hr/>

	<?php
		if(isset($_POST['logout']) && $_SESSION['username']) {
			session_destroy();
			header('Location: login.php');
    		return;
		}
	?>


