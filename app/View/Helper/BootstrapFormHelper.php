<?php
App::uses('FormHelper', 'View/Helper');
class BootstrapFormHelper extends FormHelper {

	public function create($model = null, $options = array()) {
		if (empty($options['class'])) {
			$options['class'] = 'well';
		}
		return parent::create($model, $options);
	}

  /**
  * build custom input field
  * @param $name
  * @return string
  */
  public function input($fieldName, $options = array()) {
    $this->setEntity($fieldName);

    $defaults = array(
      'format'   => array('before', 'label', 'between', 'input', 'error', 'after'),
      'div'     => array(
        'class' => 'control-group'
      ),
      'error'   => array(
        'attributes' => array(
          'class' =>'help-inline',
          'wrap' => 'span'
        )
      ),
      'help' => '',
    );

    $options = array_merge($defaults, $options);

    if (!empty($options['help'])) {
      $options['after'] = '<span class="help-block">' . $options['help'] . '</span>' . $options['after'];
    }

    $modelKey = $this->model();
    $fieldKey = $this->field();

    if ($this->_introspectModel($modelKey, 'validates', $fieldKey)) {
      $options['label'] = $this->addClass($options['div'], 'notice');
    }

    return parent::input($fieldName, $options);
  }

  public function submit($label = null) {
    $options = array(
      'div'   => 'actions',
      'class' => 'btn primary'
    );
    return parent::submit($label, $options);
  }
}