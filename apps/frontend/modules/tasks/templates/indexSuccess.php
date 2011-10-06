<?php slot("breadcrumbs") ?>
<?php end_slot() ?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
            <th>Creator</th>
            <th>Current Low Bid</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <?php $bid = $task->getLowestBid() ?>
        <tr>
            <td><?php echo link_to($task->getTitle(),'@show_task?id=' . $task->getId() ) ?></td>
            <td><?php echo $task->getShortDescription() ?></td>
            <td><?php echo $task->getSuburb() ?></td>
            <td><?php echo link_to($task->getCreatorName(), '@show_user?id=' . $task->getCreatorId()) ?></td>
            <td>
            <?php if ($bid): ?>
                <span class="price">$<?php echo $bid->getPrice() ?></span> <span class="bytext">by</span> <span class="username"><?php echo $bid->getBidder() ?></span>
            <?php endif; ?>
            </td>
        <tr>
        <?php endforeach; ?>
    </tbody>
</table>