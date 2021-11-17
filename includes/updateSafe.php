
   
<?php

if ( ! defined( 'SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

if ( isset( $_GET['name'], $_GET['gender'], $_GET['birth_date'] ) ) {

	$update_query = "UPDATE students SET name=:name, gender=:gender, birth_date=:birth_date WHERE id=:id";

	$prepared_statement = $pdo->prepare( $update_query );
	$prepared_statement->bindParam( 'name', $_GET['name'] );
	$prepared_statement->bindParam( 'gender', $_GET['gender'] );
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
