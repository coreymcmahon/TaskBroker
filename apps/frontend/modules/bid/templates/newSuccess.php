<?php slot("breadcrumbs") ?>
<?php echo link_to("Browse tasks","@browse_tasks") ?> &gt; <?php echo link_to($task->getTitle(),"@show_task?id=" . $task->getId()) ?> &gt; Bid
<?php end_slot() ?>
<?php echo form_tag_for($form,"/tasks/" . $task->getId() . "/bid") ?>
<?php foreach ($form as $ele): ?>
    <?php echo $ele->renderError() ?>
<?php endforeach; ?>
<?php echo $form["price"]->renderLabel() ?> <?php echo $form["price"]->render() ?>
<input type="submit" />
<?php if ($form->isCSRFProtected()) : ?>
  <?php echo $form['_csrf_token']->render(); ?>
<?php endif; ?>
<?php echo "</form>" ?>