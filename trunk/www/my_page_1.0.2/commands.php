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
				<h1><<x>Commands<a href="races_and_classes.php">></a></h1>
				<br />
					<?php require('connect.php');
					$script="SELECT class FROM commands GROUP BY class";
					$result=mysql_query($script);
					
					while($row=mysql_fetch_row($result)) :?>
					<h3><p class="left"><?php echo $row[0] ?></p></h3>
					<hr align="left" width="580px" style="margin-left: 15px"/>
					<table width="600px" align="center" style="text-align: left">
						<?php 
							$class=$row[0];
							$script="SELECT command,description FROM commands WHERE class='$class' ORDER BY command";
							$result_1=mysql_query($script);
							
							while($row=mysql_fetch_row($result_1)) :
						?>
								<tr>
									<td width="30%"><?php echo $row[0] ?></td>
									<td width="70%"><?php echo $row[1] ?></td>
								</tr>
							<?php endwhile;?>
					</table>
					<br />
					<?php 
					endwhile; 
					mysql_close($con);
					?>
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>