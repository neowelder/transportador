<?php

/**
 * Trip form base class.
 *
 * @method Trip getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTripForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'route_id'          => new sfWidgetFormPropelChoice(array('model' => 'Route', 'add_empty' => false)),
      'driver_vehicle_id' => new sfWidgetFormPropelChoice(array('model' => 'DriverVehicle', 'add_empty' => false)),
      'price'             => new sfWidgetFormInputText(),
      'trip_time'         => new sfWidgetFormInputText(),
      'trip_start'        => new sfWidgetFormDateTime(),
      'created_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'route_id'          => new sfValidatorPropelChoice(array('model' => 'Route', 'column' => 'id')),
      'driver_vehicle_id' => new sfValidatorPropelChoice(array('model' => 'DriverVehicle', 'column' => 'id')),
      'price'             => new sfValidatorNumber(),
      'trip_time'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'trip_start'        => new sfValidatorDateTime(),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Trip';
  }


}
