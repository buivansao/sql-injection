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
	<h1>Manage Students</h1>
	<hr/>
	<?php

	require 'vendor/autoload.php';

	use SqlInjection\MySQLConnection;

	$pdo = ( new MySQLConnection() )->connect();
	if ( $pdo === null ) {
		echo 'Whoops, could not connect to the MySQL database!';
	} else {
		$action = $_GET['action'] ?? '';

		if ( $action == 'delete' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {

			$id           = $_GET['id'];
			$delete_query = 'DELETE FROM students where id = ' . $id;

			$result = $pdo->exec( $delete_query );

			if ( $result ) {
				?>
				<div class="alert alert-success" role="alert">
					User <?= $id ?> deleted
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-warning" role="alert">
					Couldn't find user <?= $id ?>
				</div>
				<?php
			}
			?>
			<a class="btn btn-primary active" href="?action=search">Back</a>
			<?php
			die();
		}

		if ( $action === 'update' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {
			if ( isset( $_GET['first_name'], $_GET['last_name'], $_GET['birth_date'] ) ) {

				$insert_query = "UPDATE students SET first_name='{$_GET['first_name']}', last_name='{$_GET['last_name']}', birth_date='{$_GET['birth_date']}' WHERE id={$_GET['id']}";

				$result = $pdo->exec( $insert_query );

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
				die();
			}

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
			die();
		}

		if ( $action === 'insert' ) {
			if ( isset( $_GET['first_name'], $_GET['last_name'], $_GET['birth_date'] ) ) {

				$insert_query = 'INSERT INTO students(first_name, last_name, birth_date) VALUES (' .
				                "'{$_GET['first_name']}', '{$_GET['last_name']}', '{$_GET['birth_date']}')";

				$result = $pdo->exec( $insert_query );

				if ( $result ) {
					?>
					<div class="alert alert-success" role="alert">
						User inserted
					</div>
					<?php
				} else {
					?>
					<div class="alert alert-warning" role="alert">
						There was a problem while inserting the new user: <?= json_encode( $pdo->errorInfo() ) ?>
					</div>
					<?php
				}
				?>
				<a class="btn btn-primary active" href="?action=search">Back</a>
				<?php
				die();
			}

			?>
			<h2>Add Student</h2>
			<hr/>
			<form method="get">
				<input type="hidden" name="action" value="insert"/>
				<div>
					<label>
						First name:
						<input type="text" name="first_name">
					</label>
				</div>
				<div>
					<label>
						Last name:
						<input type="text" name="last_name">
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
			die();
		}

		?>
		<form method="get">
			<input type="hidden" name="action" value="search"/>
			<label>
				First name:
				<input type="text" name="first_name" value="<?= $_GET['first_name'] ?? '' ?>">
			</label>
			<label>
				Last name:
				<input type="text" name="last_name" value="<?= $_GET['last_name'] ?? '' ?>">
			</label>
			<input type="submit" value="Submit">
		</form>

		<?php
		$first_name = $_GET['first_name'] ?? '';
		$last_name  = $_GET['last_name'] ?? '';

		$count_query = 'SELECT COUNT(*) as num_rows from students where 1=1 ';

		$query = 'SELECT id, first_name, last_name, birth_date from students where 1=1 ';

		$filters = '';

		if ( $action === 'search' && ( ! empty( $first_name ) || ! empty( $last_name ) ) ) {

			if ( isset( $_GET['first_name'] ) && ! empty( $_GET['first_name'] ) ) {
				$filters .= "AND first_name LIKE '%{$_GET['first_name']}%' ";
			}

			if ( isset( $_GET['last_name'] ) && ! empty( $_GET['last_name'] ) ) {
				$filters .= "AND last_name LIKE '%{$_GET['last_name']}%' ";
			}
		}

		$count = $pdo->query( $count_query . $filters );
		if ( ! $count ) {
			throw new Exception( json_encode( $pdo->errorInfo() ) );
		}
		$count_result = $count->fetch()['num_rows'];

		$num_pages = ( $count_result / 5 ) + ( ( $count_result % 5 ) ? 1 : 0 );

		$page  = $_GET['page'] ?? 1;
		$query .= $filters . ' LIMIT 5 OFFSET ' . ( $page - 1 ) * 5;

		$result = $pdo->query( $query );

		?>
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">First name</th>
				<th scope="col">Last name</th>
				<th scope="col">Birth date</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ( $result as $row ) {
				echo '<tr>';
				echo '<th scope="row">' . $row['id'] . '</th>';
				echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['birth_date'] . '</td>';
				echo '<td>';
				echo '<a href="?action=update&id=' . $row['id'] . '"><i class="fas fa-pencil-alt"></i></a>&nbsp;';
				echo '<a href="?action=delete&id=' . $row['id'] . '"><i class="fas fa-trash"></i></a>';
				echo '</td>';
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
		<p>Number of students: <?= $count_result ?></p>
		<?php
		for ( $i = 1; $i <= $num_pages; $i ++ ) {
			if ( $action === 'search' ) {
				$filter = '&action=search&first_name=' . ( $_GET['first_name'] ?? '' ) . '&last_name=' . ( $_GET['lastname'] ?? '' );
			} else {
				$filter = '';
			}
			echo '<a href="?page=' . $i . $filter . '">' . $i . '</a> ';
		}
	}
	?>
	<hr/>
	<a href="?action=insert" class="btn btn-primary">Add Student</a>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
