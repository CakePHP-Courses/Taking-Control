<?php

class AppController extends Controller {

	public $helpers = array(
		'Paginator' => array('className' => 'BootstrapPaginator'),
		'Form' => array('className' => 'BootstrapForm'),
		'Session',
		'Html',
		'Text',
		'Cache'
	);

	public $components = array(
		'Security' => array('blackHoleCallback' => '_blackhole'),
		'RequestHandler',
		'Session',
		'Auth',
		'DebugKit.Toolbar'
	);

	public $cacheAction = '+10 seconds';


	public function _blackhole() {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Session->setFlash('Please post again');
			$this->response->statusCode(403);
			$response = $this->render();
			$response->send();
			$this->_stop();
		}
		throw new BadRequestException('Blackholed');
	}

}