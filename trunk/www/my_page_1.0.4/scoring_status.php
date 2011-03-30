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
				<h1><a href="gods_altars.php"><</a>HP, FP, Mana status<a href="savings.php">></a></h1>
				<br />
				<h3><p class="left">Health points</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<?php
						require('connect.php');
						
						$script="SELECT msg FROM short_score WHERE type='hp'";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Fatigue points</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<?php
											
						$script="SELECT msg FROM short_score WHERE type='fp'";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Mana points</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<?php
						
						$script="SELECT msg FROM short_score WHERE type='mana'";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
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