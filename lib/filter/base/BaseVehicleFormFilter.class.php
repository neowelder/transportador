<?php

/**
 * Vehicle filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVehicleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'            => new sfWidgetFormFilterInput(),
      'mark_id'          => new sfWidgetFormPropelChoice(array('model' => 'Mark', 'add_empty' => true)),
      'vechicle_type_id' => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => true)),
      'model'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'plate'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacity'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'image'            => new sfValidatorPass(array('required' => false)),
      'mark_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mark', 'column' => 'id')),
      'vechicle_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VehicleType', 'column' => 'id')),
      'model'            => new sfValidatorPass(array('required' => false)),
      'plate'            => new sfValidatorPass(array('required' => false)),
      'capacity'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vehicle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicle';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'image'            => 'Text',
      'mark_id'          => 'ForeignKey',
      'vechicle_type_id' => 'ForeignKey',
      'model'            => 'Text',
      'plate'            => 'Text',
      'capacity'         => 'Number',
    );
  }
}
