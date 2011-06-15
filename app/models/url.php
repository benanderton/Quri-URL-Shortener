<?php
class Url extends AppModel {
	var $name = 'Url';
	var $validate = array(
		'original' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please check the URL and try again',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'original' => array(
			'rule' => 'url',
			'message' => 'Ensure you have entered a valid URL'
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function saveHashed()
	{
		$id = $this->getLastInsertId();
		$data = array(
           'Url' => array(
                        'id'     =>    $id,
                        'hash'   =>    base_convert($id, 10, 16)
           )
        );

		if($this->save($data))
				return $id;
	}
}
?>