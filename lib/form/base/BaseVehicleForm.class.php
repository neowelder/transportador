<?php

/**
 * Vehicle form base class.
 *
 * @method Vehicle getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVehicleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'image'            => new sfWidgetFormInputText(),
      'mark_id'          => new sfWidgetFormPropelChoice(array('model' => 'Mark', 'add_empty' => false)),
      'vechicle_type_id' => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => false)),
      'model'            => new sfWidgetFormInputText(),
      'plate'            => new sfWidgetFormInputText(),
      'capacity'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'image'            => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'mark_id'          => new sfValidatorPropelChoice(array('model' => 'Mark', 'column' => 'id')),
      'vechicle_type_id' => new sfValidatorPropelChoice(array('model' => 'VehicleType', 'column' => 'id')),
      'model'            => new sfValidatorString(array('max_length' => 50)),
      'plate'            => new sfValidatorString(array('max_length' => 10)),
      'capacity'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('vehicle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicle';
  }


}
