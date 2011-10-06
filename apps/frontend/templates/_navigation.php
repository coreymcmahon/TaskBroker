<div id="navigation">
    <ul>
        <?php if ($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to("My Tasks","@show_user_tasks?id=" . $sf_user->getGuardUser()->getId()) ?></li>
        <li><?php echo link_to("My Bids","@show_user_bids?id=" . $sf_user->getGuardUser()->getId()) ?></li>
        <?php endif; ?>
        <li><?php echo link_to("Create task","@new_task") ?></li>
        <li><?php echo link_to("Browse tasks","@browse_tasks") ?></li>
        <?php if ($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to("My Profile","user/" . $sf_user->getGuardUser()->getId()) ?></li>
        <li><?php echo link_to("Log out","@sf_guard_signout") ?></li>
        <?php else: ?>
        <li><?php echo link_to("Log in","@sf_guard_signin") ?></li>
        <li><?php echo link_to("Register","@sf_guard_register") ?></li>
        <?php endif; ?>
    </ul>
</div>
<div id="breadcrumbs">
    <?php include_slot("breadcrumbs","") ?>
</div>