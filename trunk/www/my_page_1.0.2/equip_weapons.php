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
				<h1><a href="guilds.php"><</a>Equipment and Weapons categories<a href="gods_altars.php">></a></h1>
				<br />
				<h3><p class="left">Weapons</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="500px">
					<tr style="font-weight: bold">
						<td width="35%">Name</td>
						<td width="35%">Class</td>
						<td width="30%">[x] handed</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT name,class,handed FROM weapons ORDER BY name";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="35%"><?php echo $row[0] ?></td>
						<td width="35%"><?php echo $row[1] ?></td>
						<td width="30%"><?php echo $row[2] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Equipment</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />				
				<table align="center" width="600px">
					<?php
						$script="SELECT location FROM equip GROUP BY location ORDER BY id";
						$result=mysql_query("$script");
						
						while($row=mysql_fetch_row($result)):
						
						$location=$row[0];
						
						$script="SELECT item FROM equip WHERE location='$location' ORDER BY item";
						$result_1=mysql_query($script);
						$string="";
						$i=0;
						
						while ($row_1=mysql_fetch_row($result_1))
						{
							if ($row_1[0]==='armour')
							{
								$script="SELECT name FROM armours ORDER BY name";
								$result_2=mysql_query($script);
								$string_1="";
								$j=0;
								while($row_2=mysql_fetch_row($result_2))
								{
									$string_1[$j]=$row_2[0];
									$j++;
								}
								$row_1[0]=implode(', ',$string_1);
							}
							elseif ($row_1[0]==='helm')
							{
								$script="SELECT name FROM helms ORDER BY name";
								$result_2=mysql_query($script);
								$string_1="";
								$j=0;
								while($row_2=mysql_fetch_row($result_2))
								{
									$string_1[$j]=$row_2[0];
									$j++;
								}
								$row_1[0]=implode(', ',$string_1);
							}
							elseif ($row_1[0]==='shield')
							{
								$script="SELECT name FROM shields ORDER BY name";
								$result_2=mysql_query($script);
								$string_1="";
								$j=0;
								while($row_2=mysql_fetch_row($result_2))
								{
									$string_1[$j]=$row_2[0];
									$j++;
								}
								$row_1[0]=implode(', ',$string_1);
							}
							$string[$i]=$row_1[0];
							$i++;
						}
						$string=implode(', ',$string);
					?>
					<tr>
						<td width="50%"><?php echo $location ?></td>
						<td width="50%"><?php echo $string ?></td>
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