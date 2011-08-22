<?php echo form_tag_for($form,"tasks/create") ?>
<div id="new-task-form">
    <div class="errors">
        <?php foreach($form as $ele): ?>
            <?php echo $ele->renderError() ?>
        <?php endforeach; ?>
    </div>
    <div class="task-details">
        <div class="city row">
            <span class="label"><?php echo $form["city"]->renderLabel() ?></span>
            <span class="field"><?php echo $form["city"]->render(); ?></span>
        </div>
        <div class="title row">
            <div class="label"><?php echo $form["title"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["title"]->render(); ?></div>
        </div>
        <div class="description row">
            <div class="label"><?php echo $form["description"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["description"]->render(); ?></div>
        </div>
        <div class="date row">
            <?php /* TODO: work out a smart way to 'build' the date field from a date and time */ ?>
            <div class="label"><?php echo $form["completion_date"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["completion_date"]->render(); ?></div>
        </div>
        <div class="reserve row">
            <span class="label"><?php echo $form["reserve_price"]->renderLabel() ?></span>
            <span class="field"> $<?php echo $form["reserve_price"]->render(); ?></span>
            <div class="description">Note: the Reserve price is the maximum price you are willing to pay to get your task completed. It should include all expenses required by the person performing the task for you. This value is not shown to the people bidding on your tasks.</div>
        </div>
        <div class="payment row">
            <div class="label"><?php echo $form["payment"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["payment"]->render(); ?></div>
        </div>
        <div class="method row">
            <span class="label"><?php echo $form["method"]->renderLabel() ?></span>
            <span class="field"><?php echo $form["method"]->render(); ?></span>
        </div>
    </div>
    <div class="additional-info">
        <div class="private-description row">
            <div class="label"><?php echo $form["private_description"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["private_description"]->render(); ?></div>
        </div>
        <div class="address row">
            <div class="label"><?php echo $form["address"]->renderLabel() ?></div>
            <div class="field"><?php echo $form["address"]->render(); ?></div>
            <div class="address">
                <div>
                    <span class="label"><?php echo $form["postcode"]->renderLabel() ?></span>
                    <span class="field"><?php echo $form["postcode"]->render(); ?></span>
                </div>
                <div>
                    <span class="label"><?php echo $form["suburb"]->renderLabel() ?></span>
                    <span class="field"><?php echo $form["suburb"]->render(); ?></span>
                </div>
                <div>
                    <span class="label"><?php echo $form["state"]->renderLabel() ?></span>
                    <span class="field"><?php echo $form["state"]->render(); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="submit" />
<?php echo "</form>" ?>