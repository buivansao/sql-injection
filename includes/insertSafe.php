<?php

if ( ! defined( 'SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

if ( isset( $_GET['name'], $_GET['gender'], $_GET['birth_date'] ) ) {

	$insert_query = 'INSERT INTO students(name, gender, birth_date) VALUES ( :name, :gender, :birth_date )';

	$prepared_statement = $pdo->prepare( $insert_query );
	$prepared_statement->bindParam( 'name', $_GET['name'] );
	$prepared_statement->bindParam( 'gender', $_GET['gender'] );
	$prepared_statement->bindParam( 'birth_date', $_GET['birth_date'] );
	$prepared_statement->execute();

	$result = $prepared_statement->rowCount();

	if ( $result ) {
		?>
		<div class="alert alert-success" role="alert">
			User inserted
		</div>
		<?php
	} else {
		?>
		<div class="alert alert-warning" role="alert">
			There was a problem while inserting the new user.
		</div>
		<?php
	}
	?>
	
	<a class="btn btn-primary active" href="?action=search">Back</a>
	<?php
} else {
	?>
	<h2>Add Student</h2>
	<hr/>
	<form method="get">
		<input type="hidden" name="action" value="insert"/>
		<div>
			<label>
				Name:
				<input type="text" name="name">
			</label>
		</div>
		<div>
			<label>
				Gender:
				<input type="text" name="gender">
			</label>
		</div>
		<div>
			<label>
				Birth date:
				<input type="text" name="birth_date">
			</label>
		</div>
		<input type="submit" class="btn btn-primary" value="Submit">
		<a href="?action=search" class="btn btn-secondary">Back</a>
	</form>
	<?php
}
