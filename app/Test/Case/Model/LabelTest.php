<?php
/* Label Test cases generated on: 2012-01-29 18:32:57 : 1327861977*/
App::uses('Label', 'Model');

/**
 * Label Test Case
 *
 */
class LabelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.label', 'app.photo', 'app.user', 'app.upload', 'app.photos_label');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Label = ClassRegistry::init('Label');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Label);

		parent::tearDown();
	}

}
