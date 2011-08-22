<?php

/**
 * tasks actions.
 *
 * @package    taskbroker
 * @subpackage tasks
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tasksActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    /* TODO: add code to display tasks in here */
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TaskForm();
  }
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new TaskForm();
    $this->form->bind($request->getParameter($this->form->getName()));

    if($this->form->isValid()) {
        /* TODO: add code to save form data in here */
        $this->redirect("tasks");
    }

    $this->setTemplate("new");
  }
}
