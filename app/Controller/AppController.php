<?php

class AppController extends Controller {

	public $helpers = array(
		'Paginator' => array('className' => 'BootstrapPaginator'),
		'Form' => array('className' => 'BootstrapForm'),
		'Session',
		'Html',
		'Text',
		//'Cache'
	);

	public $components = array(
		'Security' => array('csrfUseOnce' => true),
		'RequestHandler',
		'Session',
		'Auth',
		'DebugKit.Toolbar'
	);

	//public $cacheAction = '+10 seconds';
}