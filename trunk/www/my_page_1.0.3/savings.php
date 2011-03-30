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
				<h1><a href="scoring_status.php"><</a>Savings<a href="potions.php">></a></h1>
				<br />
				<h3><p class="left">Resist and immunity</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="500px">
					<tr style="font-weight: bold">
						<td width="50%">Savings</td>
						<td width="50%">Percent value</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT savings,percentage FROM resist_immunity_value ORDER BY id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="50%"><?php echo $row[1] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Savings items</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />				
				<table align="center" width="500px">
					<tr style="font-weight: bold">
						<td width="50%">Item color</td>
						<td width="50%">Item saving</td>
					</tr>
					<?php
						$script="SELECT color,saving FROM resist_immunity_items ORDER BY id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="50%"><?php echo $row[1] ?></td>
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