<?php

/**
 * Place filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePlaceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'address' => new sfValidatorPass(array('required' => false)),
      'image'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('place_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Place';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'address' => 'Text',
      'image'   => 'Text',
    );
  }
}
