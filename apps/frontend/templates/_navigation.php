<div id="navigation">
    <ul>
        <?php if ($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to("Log out","@sf_guard_signout"); ?></li>
        <li><?php echo link_to("My Profile","user/" . $sf_user->getGuardUser()->getId()); ?></li>
        <?php else: ?>
        <li><?php echo link_to("Log in","@sf_guard_signin"); ?></li>
        <li><?php echo link_to("Register","@sf_guard_register"); ?></li>
        <?php endif; ?>
        <li><?php echo link_to("Create task","@new_task"); ?></li>
        <li><?php echo link_to("Browse tasks","@browse_tasks"); ?></li>
    </ul>
</div>