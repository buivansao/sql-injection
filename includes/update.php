<?php

if ( ! defined( 'SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

if ( isset( $_GET['name'], $_GET['gender'], $_GET['birth_date'] ) ) {

	$update_query = "UPDATE students SET name='{$_GET['name']}', gender='{$_GET['gender']}', birth_date='{$_GET['birth_date']}' WHERE id={$_GET['id']}";

	$result = $pdo->exec( $update_query );

	if ( $result ) {
		?>
		<div class="alert alert-success" role="alert">
			User updated
		</div>
		<?php
	} else {
		?>
		<div class="alert alert-warning" role="alert">
			There was a problem while updating the new user: <?= json_encode( $pdo->errorInfo() ) ?>
		</div>
		<?php
	}
	?>
	<a class="btn btn-primary active" href="?action=search">Back</a>
	<?php
} else {

	$query = "SELECT id, name, gender, birth_date from students where id={$_GET['id']}";
	$row   = $pdo->query( $query )->fetch();

	?>
	<h2>Editing student <?= $_GET['id'] ?></h2>
	<hr/>
	<form method="get">
		<input type="hidden" name="action" value="update"/>
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>"
		<label>
			Name:
			<input type="text" name="name" value="<?= $row['name'] ?>"/>
		</label>
		<br/>
		<label>
			Gender:
			<input type="text" name="gender" value="<?= $row['gender'] ?>"/>
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