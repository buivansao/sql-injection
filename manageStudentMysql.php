<?php
define( 'SQL_INJECTION_IN_PHP', true );

require 'vendor/autoload.php';

use SqlInjection\SQLiteConnection;

use SqlInjection\MySQLConnection;

$pdo = ( new MySQLConnection() )->connect();
if ( $pdo === null ) {
	echo 'Whoops, could not connect to the MySQL database!';
} else {

	require( 'includes/header.php' );

	$action = $_GET['action'] ?? '';

	if ( $action === 'delete' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {
		require( 'includes/delete.php' );
	} else if ( $action === 'update' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {
		require( 'includes/update.php' );
	} else if ( $action === 'insert' ) {
		require( 'includes/insert.php' );
	} else {
		require( 'includes/search.php' );
	}

	require( 'includes/footer.php' );
}

