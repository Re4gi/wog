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
				<h1><a href="abilities_skills_spells_traits.php"><</a>Forging<a href="guilds.php">></a></h1>
				<br />
				<h3><p class="left">Forge list</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="50%">Equipment</td>
						<td width="20%">Bars needed</td>
						<td width="30%">Time required (hours)</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT name,bars,time FROM equipment WHERE class='weapon' ORDER BY name";
						$result=mysql_query($script);

						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="20%"><?php echo $row[1] ?></td>
						<td width="30%"><?php echo $row[2] ?></td>
					</tr>
					<?php endwhile; 
					
						$script="SELECT name,bars,time FROM equipment WHERE class='armour' ORDER BY name";
						$result=mysql_query($script);

						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="20%"><?php echo $row[1] ?></td>
						<td width="30%"><?php echo $row[2] ?></td>
					</tr>
					<?php endwhile; 
						
						$script="SELECT name,bars,time FROM equipment WHERE class='shield' ORDER BY name";
						$result=mysql_query($script);

						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="20%"><?php echo $row[1] ?></td>
						<td width="30%"><?php echo $row[2] ?></td>
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