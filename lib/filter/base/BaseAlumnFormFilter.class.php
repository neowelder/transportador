<?php

/**
 * Alumn filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAlumnFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'lastname' => new sfValidatorPass(array('required' => false)),
      'address'  => new sfValidatorPass(array('required' => false)),
      'mail'     => new sfValidatorPass(array('required' => false)),
      'phone'    => new sfValidatorPass(array('required' => false)),
      'password' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumn_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumn';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'lastname' => 'Text',
      'address'  => 'Text',
      'mail'     => 'Text',
      'phone'    => 'Text',
      'password' => 'Text',
    );
  }
}
