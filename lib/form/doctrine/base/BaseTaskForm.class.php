<?php

/**
 * Task form base class.
 *
 * @method Task getObject() Returns the current form's model object
 *
 * @package    taskbroker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaskForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'creator_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => false)),
      'city'                => new sfWidgetFormInputText(),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'completion_date'     => new sfWidgetFormInputText(),
      'reserve_price'       => new sfWidgetFormInputText(),
      'payment'             => new sfWidgetFormInputText(),
      'method'              => new sfWidgetFormInputText(),
      'address'             => new sfWidgetFormInputText(),
      'suburb'              => new sfWidgetFormInputText(),
      'postcode'            => new sfWidgetFormInputText(),
      'state'               => new sfWidgetFormInputText(),
      'status'              => new sfWidgetFormInputText(),
      'winning_bid_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('WinningBid'), 'add_empty' => true)),
      'private_description' => new sfWidgetFormTextarea(),
      'category'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'creator_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'))),
      'city'                => new sfValidatorString(array('max_length' => 255)),
      'title'               => new sfValidatorString(array('max_length' => 255)),
      'description'         => new sfValidatorString(array('max_length' => 4000)),
      'completion_date'     => new sfValidatorPass(array('required' => false)),
      'reserve_price'       => new sfValidatorInteger(),
      'payment'             => new sfValidatorString(array('max_length' => 255)),
      'method'              => new sfValidatorString(array('max_length' => 255)),
      'address'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'suburb'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'postcode'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'state'               => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'status'              => new sfValidatorString(array('max_length' => 255)),
      'winning_bid_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('WinningBid'), 'required' => false)),
      'private_description' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'category'            => new sfValidatorString(array('max_length' => 255)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('task[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }

}
