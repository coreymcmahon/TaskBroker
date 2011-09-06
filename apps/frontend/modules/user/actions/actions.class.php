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
    $this->user_profile = Doctrine_Core::getTable("UserProfile")->findBy("user_id", $request->getParameter("id"));
    $this->user_profile = $this->user_profile[0];
    $this->statuses = Doctrine::getTable("UserProfile")->getStatuses();
  }

 /**
  * Shows a list of the tasks created by the user
  *
  * @param sfRequest $request A request object
  */
  public function executeShowUserTasks(sfWebRequest $request)
  {
    $this->user = Doctrine_Core::getTable("sfGuardUser")->find($request->getParameter("id"));
    $this->user_profile = Doctrine_Core::getTable("UserProfile")->findBy("user_id", $request->getParameter("id"));
    $this->user_profile = $this->user_profile[0];
    $this->tasks = Doctrine::getTable("Task")->findBy("creator_id",$this->user->getId());
  }

 /**
  * Shows a list of the bids submtted the user
  *
  * @param sfRequest $request A request object
  */
  public function executeShowUserBids(sfWebRequest $request)
  {
    $this->user = Doctrine_Core::getTable("sfGuardUser")->find($request->getParameter("id"));
    $this->user_profile = Doctrine_Core::getTable("UserProfile")->findBy("user_id", $request->getParameter("id"));
    $this->user_profile = $this->user_profile[0];
    $this->bids = Doctrine_Core::getTable("Bid")->findBy("bidder_id", $request->getParameter("id"));
  }
}
