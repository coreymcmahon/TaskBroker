<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      $this->getWidgetSchema()->moveField('username', sfWidgetFormSchema::FIRST);

      $statuses = UserProfileTable::$STATUSES;


      /* Removing user types for now...
      $this->setWidget("status", new sfWidgetFormChoice(array (
        "choices" => array (
            $statuses["POSTER"] => "Poster",
            $statuses["UNCONFIRMED-RUNNER"] => "Runner",
            $statuses["POSTER-UNCONFIRMED-RUNNER"] => "Both",
        )
      ), array("expand" => true)));


      $this->setValidator("status", new sfValidatorChoice( array ("required" => true , "choices" => $statuses)));*/

      $this->setWidget("phone", new sfWidgetFormInput());
      $this->setValidator("phone", new sfValidatorString(array("required" => false)));

      /* Let's reorder the fields... */
      $this->getWidgetSchema()->moveField('phone', sfWidgetFormSchema::FIRST);
      $this->getWidgetSchema()->moveField('last_name', sfWidgetFormSchema::FIRST);
      $this->getWidgetSchema()->moveField('first_name', sfWidgetFormSchema::FIRST);
      $this->getWidgetSchema()->moveField('username', sfWidgetFormSchema::FIRST);
      
  }
}