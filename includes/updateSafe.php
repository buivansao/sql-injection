<?php

if ( ! defined( 'SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

if ( isset( $_GET['first_name'], $_GET['last_name'], $_GET['birth_date'] ) ) {

	$update_query = "UPDATE students SET first_name=:first_name, last_name=:last_name, birth_date=:birth_date WHERE id=:id";

	$prepared_statement = $pdo->prepare( $update_query );
	$prepared_statement->bindParam( 'first_name', $_GET['first_name'] );
	$prepared_statement->bindParam( 'last_name', $_GET['last_name'] );
	$prepared_statement->bindParam( 'birth_date', $_GET['birth_date'] );
	$prepared_statement->bindParam( 'id', $_GET['id'] );
	$prepared_statement->execute();

	$result = $prepared_statement->rowCount();

	if ( $result ) {
		?>
		<div class="alert alert-success" role="alert">
			User updated
		</div>
		<?php
	} else {
		?>
		<div class="alert alert-warning" role="alert">
			There was a problem while updating the user.
		</div>
		<?php
	}
	?>
	<a class="btn btn-primary active" href="?action=search">Back</a>
	<?php
} else {

	$query = "SELECT id, first_name, last_name, birth_date from students where id={$_GET['id']}";
	$row   = $pdo->query( $query )->fetch();

	?>
	<h2>Editing student <?= $_GET['id'] ?></h2>
	<hr/>
	<form method="get">
		<input type="hidden" name="action" value="update"/>
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>"
		<label>
			First name:
			<input type="text" name="first_name" value="<?= $row['first_name'] ?>"/>
		</label>
		<br/>
		<label>
			Last name:
			<input type="text" name="last_name" value="<?= $row['last_name'] ?>"/>
		</label>
		<br/>
		<label>
			Birth date:
			<input type="text" name="birth_date" value="<?= $row['birth_date'] ?>"/>
		</label>
		<hr/>
		<input type="submit" class="btn btn-primary" value="Submit">
		<a href="?action=search" class="btn btn-secondary">Back</a>
	</form>
	<?php
}