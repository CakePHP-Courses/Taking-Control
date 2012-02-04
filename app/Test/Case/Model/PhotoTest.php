<?php
/* Photo Test cases generated on: 2012-01-29 18:27:46 : 1327861666*/
App::uses('Photo', 'Model');

/**
 * Photo Test Case
 *
 */
class PhotoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo', 'app.user', 'app.upload', 'app.label', 'app.photos_label');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Photo = ClassRegistry::init('Photo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photo);

		parent::tearDown();
	}

}
