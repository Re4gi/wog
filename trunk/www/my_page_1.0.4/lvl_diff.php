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
				<h1><a href="armours.php"><</a>Level differences<a href="others.php">></a></h1>
				<br />
				<h3><p class="left">Level difference</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table width="550px" align="center">
					<tr style="font-weight: bold">
						<td width="25%">Level difference</td>
						<td width="75%">Consider message</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT lvl,msg FROM lvl_diff ORDER BY id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="25%"><?php echo $row[0] ?></td>
						<td width="75%"><?php echo $row[1] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<?php mysql_close($con) ?>
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>