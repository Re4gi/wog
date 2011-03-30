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
				<h1><a href="lvl_diff.php"><</a>Others></h1>
				<br />
				<h3><p class="left">Learning</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td>Status</td>
					</tr>
					<?php
						require('connect.php');
						
						$script="SELECT msg FROM learning ORDER BY id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Prison</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td>Message</td>
					</tr>
					<?php
						
						$script="SELECT msg FROM prison ORDER BY id";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td><?php echo $row[0] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
				<br />
				<h3><p class="left">Mounts</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<br />
				<h4><p class="left">Whittie</p></h4>
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="50%">Name</td>
						<td width="50%">Size</td>
					</tr>
					<?php
						
						$script="SELECT name,size FROM mounts WHERE side='whittie' ORDER BY name";
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
				<h4><p class="left">Darkie</p></h4>
				<table align="center" width="400px">
					<tr style="font-weight: bold">
						<td width="50%">Name</td>
						<td width="50%">Size</td>
					</tr>
					<?php
						
						$script="SELECT name,size FROM mounts WHERE side='darkie' ORDER BY name";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):
					?>
					<tr>
						<td width="50%"><?php echo $row[0] ?></td>
						<td width="50%"><?php echo $row[1] ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
			<?php mysql_close($con) ?>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>