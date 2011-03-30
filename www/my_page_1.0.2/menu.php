<div id="menu">
	<div id="menu_up">
		<a href="index.php">home</a><br />
		<a href="history.php">history</a><br />
		<a href="#">pk logs</a><br />
		<a href="#">members</a><br />
		<a href="rules.php">rules</a><br />
		<a href="commands.php">woghints</a><br />
	</div>
	<div id="menu_down">
		<a href="http://www.wog.sk/" target="_blank">War of Gods</a><br />
		<a href="#">Gallery</a><br />
		<a href="#">Forum</a><br />
		<form action="" method="post">
	<br />
	<?php require_once('verify_login.php') ?>	
	<?php if (!isset($_SESSION['login']) || $_SESSION['login']==="guest"): ?>
		Login<br /><input type="text" name="name" maxlength="20"><br />
		Password<br /><input type="password" name="password" maxlength="20"><br />
		<input type="submit" style="visibility: hidden">
	<?php else: ?>
		<div style="font-size: 12px">Logged as</div>
		<div style="font-size: 12px; font-weight: bold"><?php echo $_SESSION['login'] ?></div>
		<br />
		<input type="hidden" name="logout" value="1">
		<input type="submit" value="Logout">
	<?php endif; ?>
	
</form>
	</div>
	
	<a href="register.php">registration</a>
</div>