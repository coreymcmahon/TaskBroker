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
      $this->setWidget("status", new sfWidgetFormChoice(array (
        "choices" => array (
            $statuses["POSTER"] => "Poster",
            $statuses["UNCONFIRMED-RUNNER"] => "Runner",
            $statuses["POSTER-UNCONFIRMED-RUNNER"] => "Both",
        )
      ), array("expand" => true)));
      $this->setValidator("status", new sfValidatorChoice( array ("required" => true , "choices" => $statuses)));

      $this->getWidgetSchema()->moveField('status', sfWidgetFormSchema::FIRST);
  }
}