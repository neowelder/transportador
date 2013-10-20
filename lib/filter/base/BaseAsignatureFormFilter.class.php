<?php

/**
 * Asignature filter form base class.
 *
 * @package    transportador
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAsignatureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grade_id' => new sfWidgetFormPropelChoice(array('model' => 'Grade', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'grade_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Grade', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('asignature_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asignature';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'grade_id' => 'ForeignKey',
    );
  }
}
