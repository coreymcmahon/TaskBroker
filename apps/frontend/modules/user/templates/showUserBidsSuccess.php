<?php if (count($bids) == 0): ?>
<div class="empty userbids">No bids to display.</div>
<div>Why don't you go <?php echo link_to("find a task","@browse_tasks") ?> to bid on!</div>
<?php else: ?>

<table>
    <thead>
        <tr>
            <th>Task title</th>
            <th>Status</th>
            <th>Bid</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
<?php foreach ($bids as $bid): ?>
    <tbody>
        <tr>
            <td><?php echo $bid->getTask()->getTitle() ?></td>
            <td><?php echo $bid->getTask()->getStatus() ?></td>
            <td><?php echo $bid->getPrice() ?></td>
            <td><a href="#" onclick="confirm('Are you sure you wish to retract this bid?');">Retract bid</a></td>
            <td></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>

<?php endif; ?>