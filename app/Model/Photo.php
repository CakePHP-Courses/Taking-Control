<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');

/**
 * Photo Model
 *
 * @property User $User
 * @property Upload $Upload
 * @property Label $Label
 */
class Photo extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Upload' => array(
			'className' => 'Upload',
			'foreignKey' => 'photo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Label' => array(
			'className' => 'Label',
			'joinTable' => 'photos_labels',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'label_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	public function add($data) {
		$this->create($data);
		$this->uploadFile();
		return $this->saveAll($this->data);
	}

	protected function uploadFile() {
	        $file = $this->data['Photo']['file'];
	        if ($file['error'] === UPLOAD_ERR_OK) {
	            $id = String::uuid();
       
	            $folderName = APP . 'webroot' . DS . 'uploads';
	            $folder = new Folder($folderName, true, 0777);
 
	            if (move_uploaded_file($file['tmp_name'], $folderName . DS . $id)) {
	                $this->data['Upload']['id'] = $id;
	                $this->data['Upload']['filename'] = $file['name'];
	                $this->data['Upload']['filesize'] = $file['size'];
	                $this->data['Upload']['filemime'] = $file['type'];
	                return true;
	            }
	        }
       
	        $this->invalidate('file', 'Failed to upload file');
       
	        return false;
	}
}
