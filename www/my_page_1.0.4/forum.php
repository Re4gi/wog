<?php require_once("head.php");
if (!isLogged())
{
	redirect('not_logged.php');
}
?>
 <body onload="getDivHeight()">
 <div id="page">
	<div id="content">
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<div id="middle">
			<div id="middle_top">
			</div>
			<div id="middle_center">
				<h1>Forum</h1>
				<hr>
				<br />
				<?php
				
					require('connect.php');
					
					$nick=$_SESSION['login'];
					$time=date('Y-m-d H:i:s');
					$message=$_POST[msg];
					$script="INSERT INTO forum (login,time,msg) VALUES ('$nick','$time','$message')";
					mysql_query($script);
				?>
				<form action="" method="post">
					<textarea rows="5" cols="70" name="msg"></textarea><br />
					<br />
					<input type="submit" value="Add">
				</form>
				<br />
				<hr>
					<?php
						
						$script="SELECT login, msg, time FROM forum ORDER BY time DESC";
						$result=mysql_query($script);
						
						while($row=mysql_fetch_row($result)):

					if ($row[1]!=""):
					?>
					
					<table width="600px" align="center">
					<tr>
						<td width="50%" style="text-align: left; font-weight: bold"><?php echo $row[0] ?></td>
						<td width="50%" style="text-align: right"><?php echo $row[2] ?></td>
					</tr>
					<tr height="20px">
					</tr>
					<tr>
						<td style="text-align: left"><?php echo $row[1] ?></td>
					</tr>
					</table>
					<hr>
					<?php endif; ?>
					<?php endwhile; ?>
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