<?php slot("breadcrumbs") ?>
<?php echo link_to("Browse tasks","@browse_tasks") ?> &gt; <?php echo $task->getTitle() ?>
<?php end_slot() ?>
<div><h2><?php echo $task->getTitle() ?></h2></div>
<div><?php echo $task->getDescription() ?></div>
<div>Must be completed by: <?php echo $task->getCompletionDate() ?></div>
<div>Payment is <?php echo $task->getPayment() ?></div>
<div>Payment method is <?php echo $task->getMethod() ?></div>
<div>Task is located: <?php echo $task->getSuburb() . " " . $task->getPostcode() ?></div>
<?php if ($sf_user->isAuthenticated() && $sf_user->getGuardUser()->isUserRunner()): ?>
<div><?php echo link_to("Bid","@bid_on_task?id=" . $task->getId()) ?></div>
<?php elseif (!$sf_user->isAuthenticated()): ?>
<div><button>Sign-up to Bid</button></div>
<?php endif; ?>
<br/>