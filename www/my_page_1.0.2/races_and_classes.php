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
				<h1><a href="commands.php"><</a>Races and Classes<a href="abilities_skills_spells_traits.php">></a></h1>
				<br />
				<h3><p class="left">Born zones</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<h4><p class="left">Whittie</p></h4>
					<table width="400px" align="center">
						<?php 
							require('connect.php');
							$script="SELECT race, zone FROM born_zones WHERE side='whittie' ORDER BY race";
							$result=mysql_query($script);
							
							while($row=mysql_fetch_row($result)) :
						?>
								<tr>
									<td width="65%"><?php echo $row[0] ?></td>
									<td width="35%"><?php echo $row[1] ?></td>
								</tr>
						<?php endwhile;?>
					</table>
				<br />
				<h4><p class="left">Darkie</p></h4>
					<table width="400px" align="center">
						<?php 
							$script="SELECT race, zone FROM born_zones WHERE side='darkie' ORDER BY race";
							$result=mysql_query($script);
							
							while($row=mysql_fetch_row($result)) :
						?>
								<tr>
									<td width="65%"><?php echo $row[0] ?></td>
									<td width="35%"><?php echo $row[1] ?></td>
								</tr>
						<?php endwhile;?>
					</table>
				<br />
				<h3><p class="left">Classes</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<h4><p class="left">Whittie</p></h4>
				<?php
					$script="SELECT races.race, races.size FROM races INNER JOIN born_zones ON races.race=born_zones.race WHERE born_zones.side='whittie' GROUP BY races.race";
					$result=mysql_query($script);
				?>
					<table width="600px" align="center">
						<tr class="first">
							<td width="20%" style="font-weight: bold">race</td>
							<td width="20%" style="font-weight: bold">size</td>
							<td width="60%" style="font-weight: bold">classes</td>						
						</tr>
					<?php while ($row=mysql_fetch_row($result)):

							$race=$row[0];
							$size=$row[1]; 
							$script="SELECT class FROM races INNER JOIN born_zones ON races.race=born_zones.race WHERE side='whittie' AND races.race='$race' ORDER BY class";
							$result_1=mysql_query($script);
							$string="";
							$i=0;
							while($row=mysql_fetch_row($result_1)){
								$string[$i]=$row[0];
								$i++;
							}
							$string=implode(", ",$string);
					?>
								<tr>
									<td width="20%"><?php echo $race ?></td>
									<td width="20%"><?php echo $size ?></td>
									<td width="60%"><?php echo $string ?></td>
								</tr>
					<?php endwhile; ?>
					</table>
				<h4><p class="left">Darkie</p></h4>
				<?php
					$script="SELECT races.race, races.size FROM races INNER JOIN born_zones ON races.race=born_zones.race WHERE born_zones.side='darkie' GROUP BY races.race";
					$result=mysql_query($script);
				?>
					<table width="600px" align="center">
						<tr>
							<td width="20%" style="font-weight: bold">race</td>
							<td width="20%" style="font-weight: bold">size</td>
							<td width="60%" style="font-weight: bold">classes</td>						
						</tr>
					<?php while ($row=mysql_fetch_row($result)):

							$race=$row[0];
							$size=$row[1]; 
							$script="SELECT class FROM races INNER JOIN born_zones ON races.race=born_zones.race WHERE side='darkie' AND races.race='$race' ORDER BY class";
							$result_1=mysql_query($script);

							$string="";
							$i=0;
							while($row=mysql_fetch_row($result_1)){
								$string[$i]=$row[0];
								$i++;
							}
							$string=implode(", ",$string);
					?>
								<tr>
									<td width="20%"><?php echo $race ?></td>
									<td width="20%"><?php echo $size ?></td>
									<td width="60%"><?php echo $string ?></td>
								</tr>
					<?php endwhile; ?>
					</table>
					<?php mysql_close($con) ?>				
					<br />						
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>