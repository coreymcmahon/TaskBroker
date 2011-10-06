<?php if (count($tasks) == 0): ?>
<div class="empty usertasks">No tasks to display.</div>
<div>Why don't you <?php echo link_to("create one","@new_task") ?>!</div>
<?php else: ?>

<table>
    <thead>
        <tr>
            <th>Task title</th>
            <th>Status</th>
            <th>Lowest Bid</th>
            <?php /*<th>&nbsp;</th> */ ?>
        </tr>
    </thead>
<?php foreach ($tasks as $task): ?>
    <?php $bid = $task->getLowestBid() ?>
    <tbody>
        <tr>
            <td><?php echo link_to($task->getTitle(),"@show_task?id=" . $task->getId()) ?></td>
            <td><?php echo $task->getStatus() ?></td>
            <td>
                <?php echo $bid ? $bid->getPrice() : "<span class=\"emptybid\">No bid</span>" ?>
                <?php echo $bid ? $bid->getBidder()->getUsername() : "" ?>
            </td>
            <?php /*<td><?php echo !$bid ? "" : link_to("Accept","@accept_bid?id=" . $task->getId() . "&bidid=" . $bid->getId(), array("onclick" => "return confirm('Are you sure you wish to accept this bid?');")) ?></td> */ ?>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>

<?php endif; ?>