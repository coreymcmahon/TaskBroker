<?php

/**
 * Bid form base class.
 *
 * @method Bid getObject() Returns the current form's model object
 *
 * @package    taskbroker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBidForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'task_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Task'), 'add_empty' => false)),
      'bidder_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bidder'), 'add_empty' => false)),
      'price'      => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'task_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Task'))),
      'bidder_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bidder'))),
      'price'      => new sfValidatorInteger(array('required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('bid[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bid';
  }

}
