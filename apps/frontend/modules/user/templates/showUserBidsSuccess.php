<?php if (count($bids) == 0): ?>
<div class="empty userbids">No bids to display.</div>
<div>Why don't you go <?php echo link_to("find a task","@browse_tasks") ?> to bid on!</div>
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
<?php foreach ($bids as $bid): ?>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>

<?php endif; ?>