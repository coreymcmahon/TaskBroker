<?php

/**
 * user actions.
 *
 * @package    taskbroker
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->user = Doctrine_Core::getTable("sfGuardUser")->find($request->getParameter("id"));
    $this->user_profile = Doctrine_Core::getTable("UserProfile")->find($request->getParameter("id"));
  }
}
