<?php

/**
 * Route filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRouteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'origin'      => new sfWidgetFormPropelChoice(array('model' => 'Place', 'add_empty' => true)),
      'destination' => new sfWidgetFormPropelChoice(array('model' => 'Place', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'origin'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Place', 'column' => 'id')),
      'destination' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Place', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('route_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Route';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'origin'      => 'ForeignKey',
      'destination' => 'ForeignKey',
    );
  }
}
