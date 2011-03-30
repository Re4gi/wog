<?php require_once("head.php") ?>
 <body onload="getDivHeight()">
 <div id="page">
	<div id="content">
		<?php $_SESSION['test']=1 ?>
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<?php
		
		unset($_SESSION['test']);
		
		require_once("./resources/functions.php");
		
		$d_login=clean($_POST[login]);
		$d_firstname=clean($_POST[firstname]);
		$d_surname=clean($_POST[surname]);
		$d_birth_date=clean($_POST[birth_date]);
		$d_street=clean($_POST[street]);
		$d_number=clean($_POST[number]);
		$d_city=clean($_POST[city]);
		$d_zip_code=clean($_POST[zip_code]);
		$d_country=clean($_POST[country]);
		$d_phone_num=clean($_POST[phone_num]);
		$d_email=clean($_POST[email]);
		$d_icq=clean($_POST[icq]);
		$d_prefered_race=clean($_POST[prefered_race]);
		$d_prefered_class=clean($_POST[prefered_class]);
		$d_pswd=md5($_POST[pswd1]);
		$d_pswd2=md5($_POST[pswd2]);
		
		require_once('connect.php');
		
		$script="SELECT login FROM NAMES WHERE login='$d_login'";
		$result=mysql_query($script);
				
		if (mysql_num_rows($result)==0 && (!empty($d_login)) && (!empty($d_firstname)) && (!empty($d_surname)) && 
		(!empty($d_email)) && (!empty($d_pswd)) && (!empty($d_pswd2)) && ($d_pswd===$d_pswd2))
		{
			$script="INSERT INTO names (login, password, firstname, surname, birth_date, email, icq) VALUES ('$d_login','$d_pswd','$d_firstname','$d_surname','$d_birth_date','$d_email','$d_icq')";
	
			mysql_query($script);

			header('Location: index.php');
			
			mysql_close($con);
		}
		?>
		<div id="middle">
			<div id="middle_top">
			</div>
			<div id="middle_center">
				<h1>Registration</h1>
				<hr align="left" width="580px" style="margin-left: 15px"/>
				<form action="" method="post">
					<table align="center" width="400px">
						<tr>
							<td width="50%">Login*:</td>
							<td width="50%"><input type="text" name="login" value="<?php echo $d_login?>"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>			
							<td width="50%">Personal information:</td>
							<td width="50%"></td>			
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>
							<td width="50%">Firstname*:</td>
							<td width="50%"><input type="text" name="firstname" value="<?php echo $d_firstname?>"></td>							
						</tr>
						<tr>
							<td width="50%">Surname*:</td>
							<td width="50%"><input type="text" name="surname" value="<?php echo $d_surname?>"></td>							
						</tr>
						<tr>
							<td width="50%">Birth Date(yyyy-mm-dd):</td>
							<td width="50%"><input type="text" name="birth_date" value="<?php echo $d_birth_date?>"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>			
							<td width="50%">Address:</td>
							<td width="50%"></td>			
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>
							<td width="50%">Street:</td>
							<td width="50%"><input type="text" name="street" value="<?php echo $d_street?>"></td>							
						</tr>
						<tr>
							<td width="50%">Number:</td>
							<td width="50%"><input type="text" name="number" value="<?php echo $d_number?>"></td>							
						</tr>
						<tr>
							<td width="50%">City:</td>
							<td width="50%"><input type="text" name="city" value="<?php echo $d_city?>"></td>							
						</tr>
						<tr>
							<td width="50%">ZIP code:</td>
							<td width="50%"><input type="text" name="zip_code" value="<?php echo $d_zip_code?>"></td>							
						</tr>
						<tr>
							<td width="50%">Country:</td>
							<td width="50%"><input type="text" name="country" value="<?php echo $d_country?>"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>			
							<td width="50%">Other contacts:</td>
							<td width="50%"></td>			
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>
							<td width="50%">Phone number:</td>
							<td width="50%"><input type="text" name="phone_num" value="<?php echo $d_phone_num?>"></td>							
						</tr>
						<tr>
							<td width="50%">Email*:</td>
							<td width="50%"><input type="text" name="email" value="<?php echo $d_email?>"></td>							
						</tr>
						<tr>
							<td width="50%">ICQ:</td>
							<td width="50%"><input type="text" name="icq" value="<?php echo $d_icq?>"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>
							<td width="50%">Prefered race:</td>
							<td width="50%"><input type="text" name="prefered_race" value="<?php echo $d_prefered_race?>"></td>							
						</tr>
						<tr>
							<td width="50%">Prefered class:</td>
							<td width="50%"><input type="text" name="prefered_class" value="<?php echo $d_prefered_class?>"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr>
							<td width="50%">Password*:</td>
							<td width="50%"><input type="password" name="pswd1"></td>							
						</tr>
						<tr>
							<td width="50%">Retype password*:</td>
							<td width="50%"><input type="password" name="pswd2"></td>							
						</tr>
						<tr height="25px">
							<td></td>
							<td></td>			
						</tr>
						<tr height="25px">
							<td width="50%"></td>
							<td width="50%"><input type="submit" value="Register"></td>			
						</tr>
					</table>
				</form>
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>