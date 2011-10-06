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
    $this->tasks = Doctrine_Core::getTable("Task")->createQuery()
            ->select("*")
            ->where("status = ?","open")
            ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $task_id = $request->getParameter("id");
    $this->task = Doctrine_Core::getTable("Task")->find($task_id);
    $this->creator = $this->task->getCreator();
    $this->bids = Doctrine_Core::getTable("Bid")->findBy("task_id",$task_id);
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

        $this->form->updateObject(
            array (
                "creator_id" => $this->getUser()->getGuardUser()->getId(),
                "status" => TaskTable::$STATUSES["open"]
            )
        );

        $task = $this->form->save();

        $this->redirect("@browse_tasks");
    }

    $this->setTemplate("new");
  }

  public function executeAcceptBid(sfWebRequest $request)
  {
      $this->task_id = $request->getParameter("id");
      $this->bid_id = $request->getParameter("bidid");
      $this->task = Doctrine_Core::getTable("Task")->find($this->task_id);
      $this->bid = Doctrine_Core::getTable("Bid")->find($this->bid_id);

      $this->task->setToAccepted();
      $this->task->save();

      $this->bid->setToAccepted();
      $this->bid->save();
  }
}
