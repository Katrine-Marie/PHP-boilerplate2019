<nav class="main-navigation">
	<ul class="site-menu">
		<li><a href="<?php echo URLROOT; ?>">HOME</a></li>
		<?php if(isset($_SESSION['user_id'])){ ?>
			<li><a href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
		<?php }else { ?>
			<li><a href="<?php echo URLROOT; ?>/users/register">Register</a></li>
			<li><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
		<?php } ?>
	</ul>
</nav>
