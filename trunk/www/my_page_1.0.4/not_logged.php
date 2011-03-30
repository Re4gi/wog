<?php require_once("head.php");
if (isLogged())
{
	redirect('forum.php');
}
?>
 <body onload="getDivHeight()">
 <div id="page">
	<div id="content">
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<div id="middle">
			<div id="middle_top">
			</div>
			<div id="middle_center">
				<div style="margin-top: 100px">
					<h2>You have to be logged to enter the forum.</h2>
				</div>
			</div>
			<div id="middle_bottom">
			</div>
		</div>		
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>