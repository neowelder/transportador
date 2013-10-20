<?php

/**
 * Route form base class.
 *
 * @method Route getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRouteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'origin'      => new sfWidgetFormPropelChoice(array('model' => 'Place', 'add_empty' => false)),
      'destination' => new sfWidgetFormPropelChoice(array('model' => 'Place', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'origin'      => new sfValidatorPropelChoice(array('model' => 'Place', 'column' => 'id')),
      'destination' => new sfValidatorPropelChoice(array('model' => 'Place', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('route[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Route';
  }


}
