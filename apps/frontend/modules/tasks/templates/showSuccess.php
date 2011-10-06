<?php slot("breadcrumbs") ?>
<?php echo link_to("Browse tasks","@browse_tasks") ?> &gt; <?php echo $task->getTitle() ?>
<?php end_slot() ?>
<div><h2><?php echo $task->getTitle() ?></h2></div>
<div><?php echo $task->getDescription() ?></div>
<div>Created by: <?php echo link_to($creator->getUsername(),"@show_user?id=" . $creator->getId()) ?></div>
<div>Must be completed by: <?php echo $task->getCompletionDate() ?></div>
<div>Payment is <?php echo $task->getPayment() ?></div>
<div>Payment method is <?php echo $task->getMethod() ?></div>
<div>Task is located: <?php echo $task->getSuburb() . " " . $task->getPostcode() ?></div>
<?php if ($sf_user->isAuthenticated() && $sf_user->getGuardUser()->isUserRunner() && !$task->isUserCreator($sf_user->getGuardUser())): ?>
<div><?php echo link_to("Bid","@bid_on_task?id=" . $task->getId()) ?></div>
<?php elseif (!$sf_user->isAuthenticated()): ?>
<div><?php echo link_to("Sign-up to Bid","@sf_guard_register") ?></div>
<?php endif; ?>
<br/>
<div>
    <h2>Bids</h2>
    <table>
    <?php foreach ($bids as $bid): ?>
        <tr>
            <td><?php echo $bid->getPrice() ?></td>
            <td><?php echo $bid->getBidder()->getUsername() ?></td>
            <?php if ($sf_user->isAuthenticated() && $task->isUserCreator($sf_user->getGuardUser())): ?>
            <td><?php echo link_to("Accept bid","@accept_bid?id=" . $task->getId() . "&bidid=" . $bid->getId(),array("onclick" => "return confirm('Are you sure you wish to accept this bid?');")) ?></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
<br/>