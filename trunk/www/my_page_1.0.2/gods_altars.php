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
				<h1><a href="equip_weapons.php"><</a>Gods and Altars<a href="scoring_status.php">></a></h1>
				<br />
				<h3><p class="left">Altar location</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<h4><p class="left">Whittie</p></h4>
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="35%">Name</td>
						<td width="65%">Zone</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT name FROM gods WHERE side='whittie' GROUP BY name ORDER BY name";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
							
							$name=$row[0];
						
							$script="SELECT zone FROM gods WHERE name='$name' and side='whittie' ORDER BY zone";
							$result_1=mysql_query($script);
							$string="";
							$i=0;
							
							while ($row_1=mysql_fetch_row($result_1))
							{
								$string[$i]= $row_1[0];
								$i++;
							}
							$string=implode(', ',$string);
					?>
							<tr>
								<td width="35%"><?php echo $name ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>
					<?php
						endwhile;
					?>
				</table>
				<br />
				<h4><p class="left">Darkie</p></h4>
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="35%">Name</td>
						<td width="65%">Zone</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT name FROM gods WHERE side='darkie' GROUP BY name ORDER BY name";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
							
							$name=$row[0];
						
							$script="SELECT zone FROM gods WHERE name='$name' and side='darkie' ORDER BY zone";
							$result_1=mysql_query($script);
							$string="";
							$i=0;
							
							while ($row_1=mysql_fetch_row($result_1))
							{
								$string[$i]= $row_1[0];
								$i++;
							}
							$string=implode(', ',$string);
					?>
							<tr>
								<td width="35%"><?php echo $name ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>
					<?php
						endwhile;
					?>
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