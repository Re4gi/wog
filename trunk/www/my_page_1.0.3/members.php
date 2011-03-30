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
				<h1>Members</h1>
				<br \>
				<h3><p class="left">List of members</p></h3>
				<hr align="left" width="580px" style="margin-left: 15px"/> 
				<br \>
				<table width="500px" align="center">
					<tr style="font-weight: bold">
						<td width="33%">Name</td>
						<td width="33%">Rank</td>
						<td width="33%">Last login</td>
					</tr>
				</table>
				<br />
				<form action="member.php" method="post" name="loginsForm">
				<table width="500px" align="center">
				<?php
					require('connect.php');
					
					$script="SELECT login,rank,last_login FROM members LEFT JOIN names USING(login) ORDER BY login";
					$result=mysql_query($script);
					
					while($row=mysql_fetch_row($result)):
				?>
				<script language="javascript">
				<!--
				function postData(name){
					var input=document.createElement('input');
					input.name='loginsLogin';
					input.type='hidden';
					input.value=name;
					document.loginsForm.appendChild(input);
					document.loginsForm.submit();
					
				}
				-->
				</script>
					<tr>
						<td width="33%" height="30px" onclick="postData('<?php echo $row[0] ?>')" style="cursor: pointer"><?php echo $row[0] ?></td>
						<td width="33%" height="30px"><?php echo $row[1] ?></td>
						<td width="33%" height="30px"><?php echo $row[2] ?></td>
					</tr>
				<?php endwhile; ?>
				</table>
				</form>
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