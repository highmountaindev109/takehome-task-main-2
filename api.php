<?php

use App\App;

// TODO A: Improve the readability of this file through refactoring and documentation.

require_once __DIR__ . '/vendor/autoload.php';

$app = new App();
// TODO B: Clean up the following code so that it's easier to see the different
// routes and handlers for the API, and simpler to add new ones.
// TODO C: Address performance concerns in the current code.
// that you would address during refactoring.
// TODO D: Identify any potential security vulnerabilities in this code.
// TODO E: Document this code to make it more understandable
// for other developers.

header( 'Content-Type: application/json' );
if ( !isset( $_GET['title'] ) && !isset( $_GET['prefixsearch'] ) ) {
	echo json_encode( [ 'content' => $app->getListOfArticles() ] );
} elseif ( isset( $_GET['prefixsearch'] ) ) {
	$list = $app->getListOfArticles();
	$ma = [];
	foreach ( $list as $ar ) {
		if ( strpos( strtolower( $ar ), strtolower( $_GET['prefixsearch'] ) ) === 0 ) {
			$ma[] = $ar;
		}
	}
	echo json_encode( [ 'content' => $ma ] );
} else {
	echo json_encode( [ 'content' => $app->fetch( $_GET ) ] );
}
