<?php slot("breadcrumbs") ?>
<?php end_slot() ?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
            <th>Creator</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?php echo link_to($task->getTitle(),'@show_task?id=' . $task->getId() ) ?></td>
            <td><?php echo $task->getShortDescription() ?></td>
            <td><?php echo $task->getSuburb() ?></td>
            <td><?php echo link_to($task->getCreatorName(), '@show_user?id=' . $task->getCreatorId()) ?></td>
        <tr>
        <?php endforeach; ?>
    </tbody>
</table>