<?php require_once("head.php") ?>
 <body>
 <div id="page">
	<div id="content">
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<div id="middle">
			<div id="middle_top">
			</div>
			<div id="middle_center">
				<h1><a href="races_and_classes.php"><</a>Abilities, Skills, Spells and Traits<a href="forging.php">></a></h1>
				<br />
				<h3><p class="left">Learn on usage</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table style="text-align: left" align="center" width="300px">
					<tr style="font-weight: bold">
						<td width="70%">name</td>
						<td style="text-align: center" width="15%">yes</td>
						<td style="text-align: center" width="15%">no</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT name,learn_on_usage FROM skills ORDER BY name";
						$result=mysql_query($script);

						while ($row=mysql_fetch_row($result)):
							if ($row[1]) 
							{
								$yes="X";
								$no="";
							}
							else
							{
								$yes="";
								$no="X";
							}
					?>
					<tr>
						<td width="70%"><?php echo $row[0] ?></td>
						<td style="text-align: center" width="15%"><?php echo $yes ?></td>
						<td style="text-align: center" width="15%"><?php echo $no ?></td>
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