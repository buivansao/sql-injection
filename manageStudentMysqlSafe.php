<?php
define( 'SQL_INJECTION_IN_PHP', true );

require 'vendor/autoload.php';

use SqlInjection\MySQLConnection;

$pdo = ( new MySQLConnection() )->connect();
if ( $pdo === null ) {
	echo 'Whoops, could not connect to the MySQL database!';
} else {

	define( 'SAFE_VERSION', true );

	require( 'includes/header.php' );

	$action = $_GET['action'] ?? '';

	if ( $action === 'delete' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {
		require( 'includes/deleteSafe.php' );
	} else if ( $action === 'update' && isset( $_GET['id'] ) && (int) $_GET['id'] > 0 ) {
		require( 'includes/updateSafe.php' );
	} else if ( $action === 'insert' ) {
		require( 'includes/insertSafe.php' );
	} else {
		require( 'includes/searchSafe.php' );
	}

	require( 'includes/footer.php' );
}