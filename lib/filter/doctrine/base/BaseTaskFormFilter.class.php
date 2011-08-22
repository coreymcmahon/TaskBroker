<?php

/**
 * Task filter form base class.
 *
 * @package    taskbroker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaskFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'creator_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'city'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'completion_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'reserve_price'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payment'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'method'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'             => new sfWidgetFormFilterInput(),
      'suburb'              => new sfWidgetFormFilterInput(),
      'postcode'            => new sfWidgetFormFilterInput(),
      'state'               => new sfWidgetFormFilterInput(),
      'status'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'winning_bid_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('WinningBid'), 'add_empty' => true)),
      'private_description' => new sfWidgetFormFilterInput(),
      'category'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'creator_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'city'                => new sfValidatorPass(array('required' => false)),
      'title'               => new sfValidatorPass(array('required' => false)),
      'description'         => new sfValidatorPass(array('required' => false)),
      'completion_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'reserve_price'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'payment'             => new sfValidatorPass(array('required' => false)),
      'method'              => new sfValidatorPass(array('required' => false)),
      'address'             => new sfValidatorPass(array('required' => false)),
      'suburb'              => new sfValidatorPass(array('required' => false)),
      'postcode'            => new sfValidatorPass(array('required' => false)),
      'state'               => new sfValidatorPass(array('required' => false)),
      'status'              => new sfValidatorPass(array('required' => false)),
      'winning_bid_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('WinningBid'), 'column' => 'id')),
      'private_description' => new sfValidatorPass(array('required' => false)),
      'category'            => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('task_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'creator_id'          => 'ForeignKey',
      'city'                => 'Text',
      'title'               => 'Text',
      'description'         => 'Text',
      'completion_date'     => 'Date',
      'reserve_price'       => 'Number',
      'payment'             => 'Text',
      'method'              => 'Text',
      'address'             => 'Text',
      'suburb'              => 'Text',
      'postcode'            => 'Text',
      'state'               => 'Text',
      'status'              => 'Text',
      'winning_bid_id'      => 'ForeignKey',
      'private_description' => 'Text',
      'category'            => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
