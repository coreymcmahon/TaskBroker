<?php

/**
 * Task form.
 *
 * @package    taskbroker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaskForm extends BaseTaskForm
{
  public function configure()
  {
      unset($this["created_at"], $this["updated_at"], 
            $this["creator_id"], $this["winning_bid_id"],
            $this["status"]);

      /* Set form element for the cities */
      $this->widgetSchema['city'] = new sfWidgetFormChoice(array(
        'choices' => Doctrine::getTable('Task')->getCities(),
        'expanded' => false
      ));
      $this->validatorSchema['city'] = new sfValidatorAnd(array(
        $this->validatorSchema['city'],
        new sfValidatorChoice(array(
            "choices" => array_keys(Doctrine::getTable('Task')->getCities())
        ))
      ));

      /* Set form element for the states */
      $this->widgetSchema['state'] = new sfWidgetFormChoice(array(
        'choices' => Doctrine::getTable('Task')->getStates(),
        'expanded' => false
      ));
      $this->validatorSchema['state'] = new sfValidatorAnd(array(
        $this->validatorSchema['state'],
        new sfValidatorChoice(array(
            "choices" => array_keys(Doctrine::getTable('Task')->getStates())
        ))
      ));

      /* Set form element for the payment time */
      $this->widgetSchema['method'] = new sfWidgetFormChoice(array(
        'choices' => Doctrine::getTable('Task')->getMethods(),
        'expanded' => false
      ));
      $this->validatorSchema['method'] = new sfValidatorAnd(array(
        $this->validatorSchema['method'],
        new sfValidatorChoice(array(
            "choices" => array_keys(Doctrine::getTable('Task')->getMethods())
        ))
      ));

      /* Set form element for the payment methods */
      $this->widgetSchema['payment'] = new sfWidgetFormChoice(array(
        'choices' => Doctrine::getTable('Task')->getPayments(),
        'expanded' => true
      ));
      $this->validatorSchema['payment'] = new sfValidatorAnd(array(
        $this->validatorSchema['payment'],
        new sfValidatorChoice(array(
            "choices" => array_keys(Doctrine::getTable('Task')->getPayments())
        ))
      ));

      /* Set form element for the categories */
      $this->widgetSchema['category'] = new sfWidgetFormChoice(array(
        'choices' => Doctrine::getTable('Task')->getCategories(),
        'expanded' => false
      ));
      $this->validatorSchema['category'] = new sfValidatorAnd(array(
        $this->validatorSchema['category'],
        new sfValidatorChoice(array(
            "choices" => array_keys(Doctrine::getTable('Task')->getCategories())
        ))
      ));

      $this->validatorSchema['title']->setMessage("required", "We need a title for your task.");
      $this->validatorSchema['description']->setMessage("required", "Please provide a description.");
      $this->validatorSchema['reserve_price']->setMessage("required", "Please set a reserve price.");
      $this->validatorSchema['payment']->setMessage("required", "Please tell us whether you will pay upfront or after completion.");


      /* Set labels */
      $this->widgetSchema->setLabels(array(
         'payment' => 'Payment will be: '
      ));
  }
}
