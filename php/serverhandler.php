<html>
		<head>
			<title>Remote Access Tool</title>
				<style type="text/css">
				</style>
				<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
					<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		</head>
	<body>
		<Flagtext class="Flag"><titleimg style="float:left"><a href="../index.html"><img src="../Images/back.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1>Management Page</h1></Flagtext>

<div class="BodyTextBox"><div class="BodyTitle">Management Page</div>

<div class="mainTextHeader">Servers:</div>


<?php

//ENCODING THE STRING GOES AS FOLLOWS: 1 or 0 for tekkit, 1 or 0 for MW, and 1 or 0 for vanilla. String is 3 characters long.




//if server start button is clicked for X, Y or Z
if($_POST['TKstart']=='Start'){
	echo 'Starting TK server';
	$file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	$prevtxt = substr($prevtxt,1);
	$finaltxt = "1" . $prevtxt;
	$file = fopen("serverStatus.txt", "w") or die("Unable to open cache. Contact u/BongoUnicorns.");
	fwrite($file,$finaltxt);
	fclose($file);

	$TKcd = 'cd ~/Documents/server/TekkitServer';
	$inputTK = 'sh ServerStart.sh';
	//THEN ADD SHELL SERVER START IN SCREEN named TK
	shell_exec('sh ../Shell/screenInterface.sh X' . 'TK' . 'X ' . '"' . $TKcd . '"');
	shell_exec('sh ../Shell/screenInterface.sh X' . 'TK' . 'X ' . '"' . $inputTK . '"');


}else if($_POST['MWstart']=='Start'){
	echo 'Starting MW server';
	$file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	$prevtxt1 = substr($prevtxt,0,1);
	$prevtxt2 = substr($prevtxt,2,1);
	$finaltxt = $prevtxt1 . "1" . $prevtxt2;
	$file = fopen("serverStatus.txt", "w") or die("Unable to open cache. Contact u/BongoUnicorns.");
	fwrite($file,$finaltxt);
	fclose($file);

	//THEN ADD SHELL SERVER START IN SCREEN named MW
	$MWcd = 'cd ~/Documents/server/MWserver';
	$inputMW = 'sh ServerStart.sh';
	shell_exec('sh ../Shell/screenInterface.sh X' . 'MW' . 'X ' . '"' . $MWcd . '"');
	shell_exec('sh ../Shell/screenInterface.sh X' . 'MW' . 'X ' . '"' . $inputMW . '"');


}else if($_POST['VNstart']=='Start'){
	echo 'Starting VN server';

}else if($_POST['TKstop']=='Stop'){
	echo 'Stopping TK server';
	$file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	$prevtxt = substr($prevtxt,1);
	$finaltxt = "0" . $prevtxt;
	$file = fopen("serverStatus.txt", "w") or die("Unable to open cache. Contact u/BongoUnicorns.");
	fwrite($file,$finaltxt);
	fclose($file);

	//THEN DESTROY SCREEN TK
	shell_exec('sh ../Shell/screenInterface.sh X' . 'TK' . 'X ' . '"' . 'stop' . '"');

}else if($_POST['MWstop']=='Stop'){
	echo 'Stopping MW server';
	$file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	$prevtxt1 = substr($prevtxt,0,1);
	$prevtxt2 = substr($prevtxt,2,1);
	$finaltxt = $prevtxt1 . "0" . $prevtxt2;
	$file = fopen("serverStatus.txt", "w") or die("Unable to open cache. Contact u/BongoUnicorns.");
	fwrite($file,$finaltxt);
	fclose($file);

	//THEN DESTROY SCREEN MW
	shell_exec('sh ../Shell/screenInterface.sh X' . 'MW' . 'X ' . '"' . 'stop' . '"');

}else if($_POST['VNstop']=='Stop'){
	echo 'Stopping VN server';

}else{


if($_POST['serverName']=='Tekkit'){
  $file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	fclose($file);
	$TKstatus = substr($prevtxt,0,1);
	if($TKstatus=='1'){
		echo 'Tekkit server is running.';
		echo <<<GAGA

		<form action="serverhandler.php" method="post" class="loginArea">
			<input type="submit" name='TKstop' value="Stop">
		</form>

GAGA;

	}else{
		echo 'Tekkit server is not running.';
		echo <<<GAGA

		<form action="serverhandler.php" method="post" class="loginArea">
			<input type="submit" name='TKstart' value="Start">
		</form>


GAGA;
	}
}

else if($_POST['serverName']=='Magic World'){
  $file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
	$prevtxt = fgets($file);
	fclose($file);
	$MWstatus = substr($prevtxt,1,1);
	if($MWstatus=='1'){
		echo 'Magic World server is running.';
		echo <<<GAGA

		<form action="serverhandler.php" method="post" class="loginArea">
			<input type="submit" name='MWstop' value="Stop">
		</form>

GAGA;

	}else{
		echo 'Magic World server is not running.';
		echo <<<GAGA

		<form action="serverhandler.php" method="post" class="loginArea">
			<input type="submit" name='MWstart' value="Start">
		</form>


GAGA;
	}
}

else{
	if($_POST['serverName']=='None'){
		$file = fopen("serverStatus.txt", "r") or die("Unable to open cache. Contact u/BongoUnicorns.");
		$prevtxt = fgets($file);
		$TKstatus = substr($prevtxt,0,1);
		if($TKstatus=='1'){
			echo 'Tekkit server is: RUNNING.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Tekkit">
			</form><br><br>';
		} else{
			echo 'Tekkit server is: not running.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Tekkit">
			</form><br><br>';
		}
		$MWstatus = substr($prevtxt,1,1);
		if($MWstatus=='1'){
			echo 'Magic World server is: RUNNING.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Magic World">
			</form><br><br>';
		}else{
			echo 'Magic World server is: not running.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Magic World">
			</form><br><br>';
		}
		$VNstatus = substr($prevtxt,2,1);
		if($VNstatus=='1'){
			echo 'Vanilla server is: RUNNING.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Vanilla">
			</form><br><br>';
		}else{
			echo 'Vanilla server is: not running.<form action="serverhandler.php" method="post" class="loginArea">
				<input type="submit" name="serverName" value="Vanilla">
			</form><br><br>';
		}

}
}}
?>

</body>
</html>
