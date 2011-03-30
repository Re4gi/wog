<?php require_once("head.php") ?>
 <body onload="getDivHeight()">
 <div id="page">
	<div id="content">
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<div id="middle">
			<div id="middle_top">
			</div>
			<div id="middle_center">
				<h1><a href="savings.php"><</a>Potions<a href="armours.php">></a></h1>
				<br />
				<h3><p class="left">Type of potions</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="500px">
				<?php
					require_once('connect.php');
					
					$script="SELECT name,spell FROM potions ORDER BY name";
					$result=mysql_query($script);
					
					while ($row=mysql_fetch_row($result)):
				?>
					
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="50%"><?php echo $row[1] ?></td>
					</tr>
					
				<?php 
					endwhile; 
					mysql_close($con);
				?>
				</table>
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>