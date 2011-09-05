<?php

/**
 * Bid form.
 *
 * @package    taskbroker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BidForm extends BaseBidForm
{
  public function configure()
  {
      unset($this["created_at"],$this["updated_at"], // Automatically set by DB
            $this["task_id"], // Set below
            $this["bidder_id"], // Taken from session
            $this["status"]); // Set by default

  }
}
