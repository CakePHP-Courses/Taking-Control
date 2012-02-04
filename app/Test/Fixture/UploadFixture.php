<?php
/* Upload Fixture generated on: 2012-01-29 18:32:45 : 1327861965 */

/**
 * UploadFixture
 *
 */
class UploadFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8', 'key' => 'primary'),
		'photo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'filename' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'filesize' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'filemime' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4f2590cd-6904-487e-b94a-afcb87e7c244',
			'photo_id' => 1,
			'filename' => 'Lorem ipsum dolor sit amet',
			'filesize' => 1,
			'filemime' => 'Lorem ipsum dolor sit amet'
		),
	);
}
