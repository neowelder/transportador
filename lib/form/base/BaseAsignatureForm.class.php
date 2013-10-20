<?php

/**
 * Asignature form base class.
 *
 * @method Asignature getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAsignatureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'grade_id' => new sfWidgetFormPropelChoice(array('model' => 'Grade', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 20)),
      'grade_id' => new sfValidatorPropelChoice(array('model' => 'Grade', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('asignature[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asignature';
  }


}
