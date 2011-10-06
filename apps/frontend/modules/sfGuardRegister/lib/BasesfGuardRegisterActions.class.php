<?php

class BasesfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));

      if ($this->form->isValid())
      {
        $event = new sfEvent($this, 'user.filter_register');
        $this->form = $this->dispatcher
          ->filter($event, $this->form)
          ->getReturnValue();

        $user = $this->form->save();

        $profile = new UserProfile();
        $profile->setUserId($user->getId());
        

        /* Removing user types for now
        $profile->setStatus($this->form->getValue("status"));

        $user_profile_table = UserProfileTable::getInstance();
         *
        if (($profile->getStatus() == $user_profile_table::$STATUSES["UNCONFIRMED-RUNNER"]) ||
            ($profile->getStatus() == $user_profile_table::$STATUSES["POSTER-UNCONFIRMED-RUNNER"])) {
        }
        */

        /* Code below just sets the user type to a poster / runner... Omitting user types for now */
        $user_profile_table = UserProfileTable::getInstance();
        $profile->setStatus($user_profile_table::$STATUSES["POSTER-RUNNER"]);
        /* / */

        if ($this->form->getValue("phone") && $this->form->getValue("phone") != "")
            $profile->setPhone($this->form->getValue("phone"));


        $profile->save();

        $this->getUser()->signIn($user);

        $this->redirect('@homepage');
      }
    }
  }
}
