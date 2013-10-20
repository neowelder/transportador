<?php

/**
 * Alumn form base class.
 *
 * @method Alumn getObject() Returns the current form's model object
 *
 * @package    transportador
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlumnForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'lastname' => new sfWidgetFormInputText(),
      'address'  => new sfWidgetFormInputText(),
      'mail'     => new sfWidgetFormInputText(),
      'phone'    => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 30)),
      'lastname' => new sfValidatorString(array('max_length' => 30)),
      'address'  => new sfValidatorString(array('max_length' => 200)),
      'mail'     => new sfValidatorString(array('max_length' => 80)),
      'phone'    => new sfValidatorString(array('max_length' => 20)),
      'password' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('alumn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumn';
  }


}
