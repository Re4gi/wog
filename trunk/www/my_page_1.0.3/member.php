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
				<h1><?php echo $_POST['loginsLogin'] ?></h1>
				<br \>
				<br \>
				<?php
					require('connect.php');
				
					$login=$_POST['loginsLogin'];
					
					$script="SELECT firstname, surname, birth_date, street, number, city, zip_code, country, phone_num, email, icq, prefered_race, prefered_class FROM names WHERE login='$login'";
					$result=mysql_query($script);
					$row=mysql_fetch_row($result);
				?>
				<table width="500px" align="center" border="0px">
					<tr height="20px" style="font-weight: bold">
						<td width="50%">Personal information:</td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%">Firstname</td>
						<td width="50%"><?php echo $row[0] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Surname</td>
						<td width="50%"><?php echo $row[1] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Date of birth</td>
						<td width="50%"><?php echo $row[2] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr height="20px" style="font-weight: bold">
						<td width="50%">Address:</td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%">Street</td>
						<td width="50%"><?php echo $row[3] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Number</td>
						<td width="50%"><?php echo $row[4] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">City</td>
						<td width="50%"><?php echo $row[5] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">ZIP code</td>
						<td width="50%"><?php echo $row[6] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Country</td>
						<td width="50%"><?php echo $row[7] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr style="font-weight: bold" height="20px">
						<td width="50%">Contacts:</td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%">Phone number</td>
						<td width="50%"><?php echo $row[8] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Email</td>
						<td width="50%"><?php echo $row[9] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">ICQ</td>
						<td width="50%"><?php echo $row[10] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr style="font-weight: bold" height="20px">
						<td width="50%">Others:</td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%"></td>
						<td width="50%"></td>
					</tr>
					<tr height="20px">
						<td width="50%">Prefered race</td>
						<td width="50%"><?php echo $row[11] ?></td>
					</tr>
					<tr height="20px">
						<td width="50%">Prefered class</td>
						<td width="50%"><?php echo $row[12] ?></td>
					</tr>
				</table>
			</div>
			<div id="middle_bottom">
			</div>
		</div>		
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>