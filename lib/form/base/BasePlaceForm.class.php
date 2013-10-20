<?php

/**
 * Place form base class.
 *
 * @method Place getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePlaceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
      'address' => new sfWidgetFormInputText(),
      'image'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 40)),
      'address' => new sfValidatorString(array('max_length' => 100)),
      'image'   => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('place[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Place';
  }


}
