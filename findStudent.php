<?php

require 'vendor/autoload.php';

use SqlInjection\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();
if ($pdo === null) {
	echo 'Whoops, could not connect to the SQLite database!';
	exit;
}

?>
<form method="get">
	<label>
		First name:
		<input type="text" name="first_name" value="<?= $_GET['first_name'] ?? '' ?>">
	</label>
	<label>
		Last name:
		<input type="text" name="last_name" value ="<?= $_GET['last_name'] ?? '' ?>">
	</label>
	<input type="submit">
</form>

<?php

if ( ! isset( $_GET['first_name']) || ! isset( $_GET['last_name'] ) ) {
	exit;
}

$query = 'SELECT id, first_name, last_name, birth_date from Students where 1=1 ';

if ( isset( $_GET['first_name'])) {
	$query .= "AND first_name LIKE '%{$_GET['first_name']}%' ";
}

if ( isset( $_GET['last_name'])) {
	$query .= "AND last_name LIKE '%{$_GET['last_name']}%' ";
}

$result = $pdo->query( $query );

?>
<table>
	<thead>
	<tr>
		<th>Id</th><th>First name</th><th>Last name</th><th>Birth date</th>
	</tr>
	</thead>
	<tbody>
<?php
foreach ( $result as $row ) {
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	echo '<td>'.$row['birth_date'].'</td>';
	echo '</tr>';
}
?>
	</tbody>
</table>
