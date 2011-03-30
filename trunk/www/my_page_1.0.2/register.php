<?php require_once("head.php") ?>
 <body>
 <div id="page">
	<div id="content">
		<?php require_once("top.php") ?>
		<?php require_once("menu.php") ?>
		<?php
		require_once("./resources/functions.php");
		
		$d_login=clean($_POST[login]);
		$d_firstname=clean($_POST[firstname]);
		$d_surname=clean($_POST[surname]);
		$d_birth_date=clean($_POST[birth_date]);
		$d_email=clean($_POST[email]);
		$d_icq=clean($_POST[icq]);
		$d_pswd=md5(clean($_POST[pswd1]));
		$d_pswd2=md5(clean($_POST[pswd2]));
		
		if ((!empty($d_login)) && (!empty($d_firstname)) && (!empty($d_surname)) && 
		(!empty($d_email)) && (!empty($d_pswd)) && (!empty($d_pswd2)) && ($d_pswd===$d_pswd2))
		{
			require_once("connect.php");
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
				<div id="middle_left">
					Login:<br />
					<br />
					Personal information:<br />
					<br />
					Firstname:<br />
					Surname:<br />
					Birth Date (yyyy-mm-dd):<br />
					<br />
					Other contacts:<br />
					<br />
					Email:<br />
					ICQ:<br />
					<br />
					Password:<br />
					Retype password:<br />
					<br/>
				</div>
				<div id="middle_right">
					<form action="" method="post">
						<input type="text" name="login" maxlength="20" value="<?php echo $d_login ?>"><br />
						<br />
						<br />
						<br />
						<input type="text" name="firstname" maxlength="15" value="<?php echo $d_firstname ?>"><br />
						<input type="text" name="surname" maxlength="20" value="<?php echo $d_surname ?>"><br />
						<input type="text" name="birth_date" value="<?php echo $d_birth_date ?>"><br />
						<br />
						<br />
						<input type="text" name="email" maxlength="30" value="<?php echo $d_email ?>"><br />
						<input type="text" name="icq" maxlength="12" value="<?php echo $d_icq ?>"><br />
						<br />
						<input type="password" name="pswd1"><br />
						<input type="password" name="pswd2"><br />
						<br/>
						<input type="submit" value="Register">
					</form>
				</div>
			</div>
			<div id="middle_bottom">
			</div>
		</div>
		<?php require_once("footer.php") ?>
	</div>
</div>
</body>
</html>