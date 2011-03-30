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
				<h1><a href="forging.php"><</a>Guilds<a href="equip_weapons.php">></a></h1>
				<br />
				<h3><p class="left">Location</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<h4><p class="left">Whittie</p></h4>
				<br />
				<table width="600px" align="center">
					<tr style="font-weight: bold">
						<td width="20%">Class</td>
						<td width="15%">up to lvl</td>
						<td width="65%">Zone</td>
					</tr>
				</table>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<?php
					require('connect.php');
					
					$script="SELECT class FROM guilds WHERE side='whittie' GROUP BY class ORDER BY class";
					$result=mysql_query($script);
					
					while ($row=mysql_fetch_row($result)):
				?>
						<table width="600px" align="center">	

						<?php					
							$class=$row[0];
							
							$script="SELECT COUNT(*) FROM (SELECT class,lvl FROM guilds WHERE class='$class' AND side='whittie' GROUP BY lvl) AS tabulka";
							$result_1=mysql_query($script);
	
							$script="SELECT lvl FROM guilds WHERE side='whittie' AND class='$class' GROUP BY lvl ORDER BY lvl";
							$result_2=mysql_query($script);
						
							if ($row_1=mysql_fetch_row($result_2)):							
								$lvl=$row_1[0];
								
								$script="SELECT zone FROM guilds WHERE side='whittie' AND class='$class' AND lvl='$lvl'";
								$result_3=mysql_query($script);
								$string="";
								$i=0;
								
								while ($row_2=mysql_fetch_row($result_3))
								{
									$string[$i]=$row_2[0];
									$i++;
								}
								$string=implode(', ',$string);
						?>
							<tr>
								<td rowspan="5" width="20%"><?php echo $class ?></td>
								<td width="15%"><?php echo $lvl ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>	
						<?php 
							endif;						
							
							while ($row_1=mysql_fetch_row($result_2)):
							
								$lvl=$row_1[0];
								
								$script="SELECT zone FROM guilds WHERE side='whittie' AND class='$class' AND lvl='$lvl'";
								$result_3=mysql_query($script);
								$string="";
								$i=0;
								
								while ($row_2=mysql_fetch_row($result_3))
								{
									$string[$i]=$row_2[0];
									$i++;
								}
								$string=implode(', ',$string);
						?>
							<tr>
								<td width="15%"><?php echo $lvl ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>
							<?php endwhile;?>
						</table>
						<hr align="left" width="580px" style="margin-left: 15px"/>											
					<?php endwhile;?>
					<br />
				<h4><p class="left">Darkie</p></h4>
				<br />
				<table width="600px" align="center">
					<tr style="font-weight: bold">
						<td width="20%">Class</td>
						<td width="15%">up to lvl</td>
						<td width="65%">Zone</td>
					</tr>
				</table>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<?php
									
					$script="SELECT class FROM guilds WHERE side='darkie' GROUP BY class ORDER BY class";
					$result=mysql_query($script);
					
					while ($row=mysql_fetch_row($result)):
				?>
						<table width="600px" align="center">	

						<?php					
							$class=$row[0];
							
							$script="SELECT COUNT(*) FROM (SELECT class,lvl FROM guilds WHERE class='$class' AND side='darkie' GROUP BY lvl) AS tabulka";
							$result_1=mysql_query($script);
	
							$script="SELECT lvl FROM guilds WHERE side='darkie' AND class='$class' GROUP BY lvl ORDER BY lvl";
							$result_2=mysql_query($script);
						
							if ($row_1=mysql_fetch_row($result_2)):							
								$lvl=$row_1[0];
								
								$script="SELECT zone FROM guilds WHERE side='darkie' AND class='$class' AND lvl='$lvl'";
								$result_3=mysql_query($script);
								$string="";
								$i=0;
								
								while ($row_2=mysql_fetch_row($result_3))
								{
									$string[$i]=$row_2[0];
									$i++;
								}
								$string=implode(', ',$string);
						?>
							<tr>
								<td rowspan="5" width="20%"><?php echo $class ?></td>
								<td width="15%"><?php echo $lvl ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>	
						<?php 
							endif;						
							
							while ($row_1=mysql_fetch_row($result_2)):
							
								$lvl=$row_1[0];
								
								$script="SELECT zone FROM guilds WHERE side='darkie' AND class='$class' AND lvl='$lvl'";
								$result_3=mysql_query($script);
								$string="";
								$i=0;
								
								while ($row_2=mysql_fetch_row($result_3))
								{
									$string[$i]=$row_2[0];
									$i++;
								}
								$string=implode(', ',$string);
						?>
							<tr>
								<td width="15%"><?php echo $lvl ?></td>
								<td width="65%"><?php echo $string ?></td>
							</tr>
							<?php endwhile;?>
						</table>
						<hr align="left" width="580px" style="margin-left: 15px"/>											
					<?php endwhile;?>
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