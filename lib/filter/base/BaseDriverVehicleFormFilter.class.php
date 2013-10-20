<?php

/**
 * DriverVehicle filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDriverVehicleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'driver_id'  => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'vehicle_id' => new sfWidgetFormPropelChoice(array('model' => 'Vehicle', 'add_empty' => true)),
      'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'driver_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Driver', 'column' => 'id')),
      'vehicle_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehicle', 'column' => 'id')),
      'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('driver_vehicle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverVehicle';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'driver_id'  => 'ForeignKey',
      'vehicle_id' => 'ForeignKey',
      'is_active'  => 'Boolean',
    );
  }
}
