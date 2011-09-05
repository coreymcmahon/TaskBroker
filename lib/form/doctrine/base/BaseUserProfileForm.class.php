<?php

/**
 * UserProfile form base class.
 *
 * @method UserProfile getObject() Returns the current form's model object
 *
 * @package    taskbroker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'status'     => new sfWidgetFormInputText(),
      'suburb'     => new sfWidgetFormInputText(),
      'postcode'   => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'about'      => new sfWidgetFormTextarea(),
      'twitter'    => new sfWidgetFormInputText(),
      'feedback'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'status'     => new sfValidatorInteger(array('required' => false)),
      'suburb'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'postcode'   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'phone'      => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'about'      => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'twitter'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'feedback'   => new sfValidatorNumber(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProfile';
  }

}
