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
        $profile->setStatus($this->form->getValue("status"));

        $user_profile_table = UserProfileTable::getInstance();

        if (($profile->getStatus() == $user_profile_table::$STATUSES["UNCONFIRMED-RUNNER"]) ||
            ($profile->getStatus() == $user_profile_table::$STATUSES["POSTER-UNCONFIRMED-RUNNER"])) {
         // TODO - do code in here to handle confirmation
        }

        if ($this->form->getValue("phone") && $this->form->getValue("phone") != "")
            $profile->setPhone($this->form->getValue("phone"));


        $profile->save();

        $this->getUser()->signIn($user);

        $this->redirect('@homepage');
      }
    }
  }
}
