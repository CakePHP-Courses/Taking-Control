<?php
/* Photos Test cases generated on: 2012-01-29 18:30:56 : 1327861856*/
App::uses('PhotosController', 'Controller');

/**
 * TestPhotosController *
 */
class TestPhotosController extends PhotosController {
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
 * PhotosController Test Case
 *
 */
class PhotosControllerTestCase extends CakeTestCase {
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

		$this->Photos = new TestPhotosController();
		$this->Photos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photos);

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
