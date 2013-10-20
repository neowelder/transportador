<?php

/**
 * DriverVehicle form base class.
 *
 * @method DriverVehicle getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverVehicleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'driver_id'  => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => false)),
      'vehicle_id' => new sfWidgetFormPropelChoice(array('model' => 'Vehicle', 'add_empty' => false)),
      'is_active'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'driver_id'  => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id')),
      'vehicle_id' => new sfValidatorPropelChoice(array('model' => 'Vehicle', 'column' => 'id')),
      'is_active'  => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('driver_vehicle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverVehicle';
  }


}
