<?php

namespace Tests;

use App\App;

/**
 * @coversDefaultClass App
 */
class AppTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @covers ::fetch
	 */
	public function testFetch() {
		$app = new App();
		$x = $app->fetch( [ 'title' => 'Foo' ] );
		$this->assertStringContainsString( 'Use of metasyntactic variables', $x );
	}
}
