<?php slot("breadcrumbs") ?>
<?php echo link_to("Browse tasks","@browse_tasks") ?> &gt; <?php echo link_to($task->getTitle(),"@show_task?id=" . $task->getId()) ?> &gt; Bid
<?php end_slot() ?>
<h1>yeah bid on that shit</h1>