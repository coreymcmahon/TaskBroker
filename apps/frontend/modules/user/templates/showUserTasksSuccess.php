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
            <th>Lowest Bidder</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
<?php foreach ($tasks as $task): ?>
    <tbody>
        <tr>
            <td><?php echo link_to($task->getTitle(),"@show_task?id=" . $task->getId()) ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="#" onclick="return false;">Accept</a></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>

<?php endif; ?>