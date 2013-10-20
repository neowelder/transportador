<?php

/**
 * Driver form base class.
 *
 * @method Driver getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'lastname'   => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 100)),
      'lastname'   => new sfValidatorString(array('max_length' => 100)),
      'phone'      => new sfValidatorString(array('max_length' => 10)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('driver[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Driver';
  }


}
