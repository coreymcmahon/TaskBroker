<div><h2><?php echo $task->getTitle() ?></h2></div>
<div><?php echo $task->getDescription() ?></div>
<div>Must be completed by: <?php echo $task->getCompletionDate() ?></div>
<div>Payment is <?php echo $task->getPayment() ?></div>
<div>Payment method is <?php echo $task->getMethod() ?></div>
<div>Task is located: <?php echo $task->getSuburb() . " " . $task->getPostcode() ?></div>
<?php if ($sf_user->isAuthenticated() && $sf_user->getGuardUser()->isUserRunner()): ?>
<div><button>Bid</button></div>
<?php endif; ?>
<br/>