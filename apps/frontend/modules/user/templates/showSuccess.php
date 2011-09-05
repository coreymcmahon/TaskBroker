<h1>User Profile</h1>
<div><label>Username:</label> <span><?php echo $user->getUsername(); ?></span></div>
<div><label>Twitter:</label> <span><?php if ($user_profile->getTwitterName() != ""): ?>
        <?php echo link_to($user_profile->getTwitterName(),$user_profile->getTwitterURL(),array("target"=>"_blank")) ?>
        <?php endif; ?>
    </span></div>
<div><label>Name:</label> <span><?php echo $user->getFirstName(); ?> <?php echo $user->getLastName(); ?></span></div>
<div><label>Status:</label> <span><?php echo $user_profile->getStatusName(); ?></span></div>
<div><label>Phone:</label> <span><?php echo $user_profile->getPhone(); ?></span></div>
<div><label>Suburb:</label> <span><?php echo $user_profile->getSuburb(); ?></span></div>
<div><label>Postcode:</label> <span><?php echo $user_profile->getPostcode(); ?> </span></div>
<div><label>About:</label> <span><?php echo $user_profile->getAbout(); ?></span></div>
<div>&nbsp;</div>