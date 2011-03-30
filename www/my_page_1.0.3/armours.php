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
				<h1><a href="potions.php"><</a>Armours<a href="lvl_diff.php">></a></h1>
				<br />
				<h3><p class="left">Dodge equipment</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="60%">Material</td>
						<td width="40%">from lvl</td>
					</tr>
					<?php

						require('connect.php');

						$script="SELECT material,lvl FROM equip_material WHERE type='dodge' ORDER BY lvl,id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="60%"><?php echo $row[0] ?></td>
						<td width="40%"><?php echo $row[1] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Absorbage equipment</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="60%">Material</td>
						<td width="40%">from lvl</td>
					</tr>
					<?php
						$script="SELECT material,lvl FROM equip_material WHERE type='absorbage' ORDER BY lvl,id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="60%"><?php echo $row[0] ?></td>
						<td width="40%"><?php echo $row[1] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Class equipment</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />	
				<table align="center" width="200px"  style="float: left; margin-left: 100px">
					<tr style="font-weight: bold">	
						<td>Absorbage</td>
					</tr>
					<?php
						$script="SELECT class FROM equip_class WHERE type='absorbage' ORDER BY id";
						$result=mysql_query($script);
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
					<tr>
					<?php endwhile; ?>
				</table>
				<table align="center" width="200px"  style="float: right; margin-right: 100px">
					<tr style="font-weight: bold">	
						<td>Dodge</td>
					</tr>
					<?php
						$script="SELECT class FROM equip_class WHERE type='dodge' ORDER BY id";
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