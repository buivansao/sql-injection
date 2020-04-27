<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Find Student</title>
</head>
<body>
<div class="container">
<h1>Find Student</h1>
<?php

require 'vendor/autoload.php';

use SqlInjection\MySQLConnection;

$pdo = ( new MySQLConnection() )->connect();
if ( $pdo === null ) {
	echo 'Whoops, could not connect to the MySQL database!';
} else {

	?>
	<form method="get">
		<label>
			First name:
			<input type="text" name="first_name" value="<?= $_GET['first_name'] ?? '' ?>">
		</label>
		<label>
			Last name:
			<input type="text" name="last_name" value="<?= $_GET['last_name'] ?? '' ?>">
		</label>
		<input type="submit">
	</form>

	<?php

	$first_name = $_GET['first_name'] ?? '';
	$last_name  = $_GET['last_name'] ?? '';

	if ( ! empty( $first_name ) || ! empty( $last_name ) ) {

		$query = 'SELECT id, first_name, last_name, birth_date from students where 1=1 ';

		if ( isset( $_GET['first_name'] ) && ! empty( $_GET['first_name'] ) ) {
			$query .= "AND first_name LIKE '%{$_GET['first_name']}%' ";
		}

		if ( isset( $_GET['last_name'] ) && ! empty( $_GET['last_name'] ) ) {
			$query .= "AND last_name LIKE '%{$_GET['last_name']}%' ";
		}

		$result = $pdo->query( $query );

		if ( ! $result) {
			echo print_r($pdo->errorInfo());
		}

		?>
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">First name</th>
				<th scope="col">Last name</th>
				<th scope="col">Birth date</th>
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
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
		<?php
	}
}
?>
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