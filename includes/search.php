<?php

if ( ! defined('SQL_INJECTION_IN_PHP' ) ) {
	die( 'Direct access not permitted' );
}

?>
	<form method="get">
		<input type="hidden" name="action" value="search"/>
		<label>
			Name:
			<input type="text" name="name" value="<?= $_GET['name'] ?? '' ?>" size=100>
		</label>
		<input type="submit" value="Submit">
	</form>

	<?php
	
	$name = $_GET['name'] ?? '';

	$count_query = 'SELECT COUNT(*) as num_rows from students ';

	$query = 'SELECT id, name, gender, birth_date from students ';

	$filters = '';
	

	if (  ! empty( $name )) {

		if ( isset( $_GET['name'] )) {
			$filters .= "WHERE name LIKE '%{$_GET['name']}%'";
		}

	}
	

	/*$parameters = [];

	if (  ! empty( $name )) {

		if ( isset( $_GET['name'] )) {
			$filters .= "AND name LIKE :name ";
			$parameters['name'] = $_GET['name'];
		}

	}
*/

   $page  = $_GET['page'] ?? 1;
	$query .= $filters . ' LIMIT 5 OFFSET ' . ( $page - 1 ) * 5;

	$result = $pdo->query( $query );

	$count_query = $pdo->query( $count_query . $filters );
	$count_result = $count_query ? $count_query->fetch()['num_rows'] : 0;
	$num_pages = ( $count_result / 5 ) + ( ( $count_result % 5 ) ? 1 : 0 );
	?>
	<table class="table table-striped">
		<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Name</th>
			<th scope="col">Gender</th>
			<th scope="col">Birth date</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$stt = 1;
		if ( $result ) {
			foreach ( $result as $row ) {
				echo '<tr>';
				echo '<th scope="row">' . $stt . '</th>';
				// echo '<th scope="row">' . $row['id'] . '</th>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['gender'] . '</td>';
				echo '<td>' . $row['birth_date'] . '</td>';
				echo '<td>';
				echo '<a href="?action=update&id=' . $row['id'] . '"><i class="fas fa-pencil-alt"></i></a>&nbsp;';
				echo '<a href="?action=delete&id=' . $row['id'] . '"><i class="fas fa-trash"></i></a>';
				echo '</td>';
				echo '</tr>';
				$stt++;
			}
		}
		?>
		</tbody>
	</table>
	<p>Number of students: <?= $count_result ?></p>

	<?php
	for ( $i = 1; $i <= $num_pages; $i ++ ) {
		if ( $action === 'search' ) {
			$filter = '&action=search&name=' . $name . '';
		} else {
			$filter = '';
		}
		echo '<a href="?page=' . $i . $filter . '">' . $i . '</a> ';
	}
?>
	
	

<hr/>
<a href="?action=insert" class="btn btn-primary">Add Student</a>

