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

    $this->form = new MyProfileForm();
    $this->form->setProfile($this->user,$this->user_profile);
  }

  /**
   *
   * @param sfWebRequest $request 
   */
  public function executeSubmit(sfWebRequest $request) {
      $this->form = new MyProfileForm();
      $this->form->bind($request->getParameter('profile'));
      $this->form->isValid();
      
      $values = $this->form->getValues();
      
      if ($this->form->isValid()) {
        $values = $this->form->getValues();

        if ($request->getParameter("id") == $this->getUser()->getGuardUser()->getId()) {
            $user = Doctrine_Core::getTable("sfGuardUser")->find($request->getParameter("id"));
            $user_profile = Doctrine_Core::getTable("UserProfile")->findOneBy("user_id", $request->getParameter("id"));

            $user->setEmailAddress($values["email"]);
            $user_profile->setTwitter($values["twitter"]);
            $user->setFirstName($values["firstname"]);
            $user->setLastName($values["surname"]);
            $user_profile->setPhone($values["phone"]);
            $user_profile->setSuburb($values["postcode"]);
            $user_profile->setPostcode($values["suburb"]);
            $user_profile->setAbout($values["about"]);

            $user->save();
            $user_profile->save();

            $this->getUser()->setFlash("saved_message","Saved!");
        }
        
      }

      $this->redirect("@show_user?id=" . $request->getParameter("id"));
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
