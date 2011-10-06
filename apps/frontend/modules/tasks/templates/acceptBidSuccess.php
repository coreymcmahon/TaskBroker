<?php slot("breadcrumbs") ?>
<?php echo link_to("Browse tasks","@browse_tasks") ?> &gt; <?php echo $task->getTitle() ?>
<?php end_slot() ?>
<div><h2><?php echo $task->getTitle() ?></h2></div>

<br/>