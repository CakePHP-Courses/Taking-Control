<?php
/* Labels Test cases generated on: 2012-01-29 18:32:57 : 1327861977*/
App::uses('LabelsController', 'Controller');

/**
 * TestLabelsController *
 */
class TestLabelsController extends LabelsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * LabelsController Test Case
 *
 */
class LabelsControllerTestCase extends CakeTestCase {
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

		$this->Labels = new TestLabelsController();
		$this->Labels->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Labels);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
