<?php

/**
 * bid actions.
 *
 * @package    taskbroker
 * @subpackage bid
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bidActions extends sfActions
{
 /**
  * Executes new action - displays the form for a user to place a bid on a task.
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {
    $this->task = Doctrine_Core::getTable("Task")->find($request->getParameter("id"));
    $this->form = new BidForm();
  }
 /**
  * Executes create action. This is used to actually create the object in the database.
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
    $task_id = $request->getParameter("id");
    $this->task = Doctrine_Core::getTable("Task")->find($task_id);
    $this->form = new BidForm();

    $this->form->bind($request->getParameter($this->form->getName()));

    if ($this->form->isValid()) {
        $this->form->updateObject(array(
            "task_id" => $task_id,
            "bidder_id" => $this->getUser()->getGuardUser()->getId(),
            "status" => BidTable::$STATUS["open"]
        ));
        $bid = $this->form->save();
        $bid->setPriceInDollars($bid->getPrice());
        $bid->save();
        return $this->redirect("@show_task?id=" . $task_id);
    }

    $this->setTemplate("new");
  }
}
