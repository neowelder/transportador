<?php

/**
 * Trip filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTripFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'route_id'          => new sfWidgetFormPropelChoice(array('model' => 'Route', 'add_empty' => true)),
      'driver_vehicle_id' => new sfWidgetFormPropelChoice(array('model' => 'DriverVehicle', 'add_empty' => true)),
      'price'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trip_time'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trip_start'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'route_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Route', 'column' => 'id')),
      'driver_vehicle_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DriverVehicle', 'column' => 'id')),
      'price'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'trip_time'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trip_start'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('trip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Trip';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'route_id'          => 'ForeignKey',
      'driver_vehicle_id' => 'ForeignKey',
      'price'             => 'Number',
      'trip_time'         => 'Number',
      'trip_start'        => 'Date',
      'created_at'        => 'Date',
    );
  }
}
