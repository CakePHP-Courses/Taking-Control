<?php
/* Upload Test cases generated on: 2012-01-29 18:32:45 : 1327861965*/
App::uses('Upload', 'Model');

/**
 * Upload Test Case
 *
 */
class UploadTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.upload', 'app.photo', 'app.user', 'app.label', 'app.photos_label');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Upload = ClassRegistry::init('Upload');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Upload);

		parent::tearDown();
	}

}
