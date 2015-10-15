<?php 
@include_once "langdoc.php";
if(!isset($_COOKIE['lang'])) {
	setcookie("lang","ru",2147485547);
	$lang = "ru";
} else $lang = $_COOKIE["lang"];
$sitename = "CSGOBET.US - Топ игроки рулетки";
$title = "$sitename";
@include_once('set.php');
@include_once('steamauth/steamauth.php');
@include_once('steamauth/userInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div style="width: 986px;" id="wrapper">
		<header style="width: 742px;margin-bottom: 0px; float: right; background: #353535; border-radius: 0; margin-right: 1px;" id="header">
		<p style="color: #f5f5f5; float: left; width: 72%; padding-left: 28px; font-size: 14px; height: 51px; font-family: Calibri Light;">Участвующие вносят скины, по достижении определенного максимального количества случайным образом выбирается победитель, который получит все скины. Шанс выигрыша зависит от стоимости внесенных скинов.</p>
			<div style="width: 179px;float: right;">
				<?php
				if(!isset($_SESSION["steamid"])) {
					steamlogin();
					//echo '<div style="display: inline-block; margin: 35px 90px 0 0; color: #eee; font-size: 12pt;"><a href=en.php><img src=img/en.gif></a><a href=ru.php><img src=img/ru.gif></a></div>';
					echo "<a style=\"height: 36px; width: 124px; background: url(image/verh/logins.png); border-bottom: 0; border-radius: 0; padding-top: 5px; font-family: Calibri Light; font-size: 12pt; text-shadow: none; color: #333333; text-align: right; padding-right: 16px; margin-top: 19px;\" class=\"btn\" href=\"?login\">".$msg[$lang]["login2"]."</a>";
				} else {
					//echo '<div style="display: inline-block; margin: 35px 90px 0 0; color: #eee; font-size: 12pt;"><a href=en.php><img src=img/en.gif></a><a href=ru.php><img src=img/ru.gif></a>    '.$msg[$lang]["loggedin"].' sf</div>';
					echo '<div style="width: 57px; height: 53px;display: inline-block; margin-top: 20px; float: left;"><img style="width: 57px; height: 53px;" src="'.$steamprofile['avatarfull'].'"></div><div style="display: inline-block; color: #eee; font-size: 12pt; float: left; text-align: center; padding-top: 27px; padding-left: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.$steamprofile['personaname'].' </div><div><a style="width: 16px; height: 16px; float: left; margin-top: 7px; margin-right: 0; padding-left: 0px; border-bottom-width: 0px; border-radius: 0; background: url(image/verh/set.png); margin-left: 37px;" class="btn" href="./settings.php"></a><a style="width: 16px; height: 16px; float: left; margin-top: -16px; margin-right: 0; padding-left: 0px; border-bottom-width: 0px; border-radius: 0; background: url(image/verh/exit.png); margin-left: 66px;" class="btn" href="steamauth/logout.php"></a></div>';
					mysql_query("UPDATE users SET name='".$steamprofile['personaname']."', avatar='".$steamprofile['avatarfull']."' WHERE steamid='".$_SESSION["steamid"]."'");
				}
				?>
    		</div>
	    </header>
			<div id="main">
				<div style="padding-left: 8px;width: 194px;background: #1c1c1c;margin-right: 0px;" class="sidebar">
					<nav style="width: 194px;background: #1c1c1c;padding-left: 8px;" id="nav">
					<img style="margin-left: -3px;  margin-bottom: 10px;" src="image/levaia/logo.png" alt="logo">
						<ul style="background: none;padding: 5px 0px;background: #1c1c1c;list-style-type: none;">
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/1.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 9px;" href="/"><?php echo $msg[$lang]["mainpage"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/2.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="/history.php"><?php echo $msg[$lang]["history"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/3.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="/top.php"><?php echo $msg[$lang]["top"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/4.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="/about.php"><?php echo $msg[$lang]["about"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/5.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="/rules.php"><?php echo $msg[$lang]["rules"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/6.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="/"  target="_blank"><?php echo $msg[$lang]["vk"]; ?></a></li>
						</ul>
											<?php 
					if(isset($_SESSION["steamid"])) {
						?>
						<ul style="background: none;padding: 5px 0px;background: #1c1c1c;list-style-type: none;">
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/7.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 9px;" href="./settings.php"><?php echo $msg[$lang]["settings"]; ?></a></li>
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/8.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" href="steamauth/logout.php"><?php echo $msg[$lang]["logout"]; ?></a></li>
						</ul>
						<?php } ?>
					</nav>
					<div style="background: #1C1C1C;width: 194px;" class="last-winner">
						<h3 style="font-family: Arial; font-size: 11pt; color: #ffc600; font-weight: 600;">Последний победитель</h3>
						<img style="margin-bottom: 27px;" src="image/levaia/online.png">
						<?php 
							$lastgame = fetchinfo("value","info","name","current_game");
							$lastwinner = fetchinfo("userid","games","id",$lastgame-1);
							$winnercost = fetchinfo("cost","games","id",$lastgame-1);
							$winnerpercent = round(fetchinfo("percent","games","id",$lastgame-1),1);
							$winneravatar = fetchinfo("avatar","users","steamid",$lastwinner);
							$winnername = fetchinfo("name","users","steamid",$lastwinner);
						?>
						<div class="visual">
							<img style="border-radius: 60px; border: 5px #2d2d2d solid;" src="<?php echo $winneravatar ?>" alt="image description" width="109" height="109">
						</div>
						<h3 style="font-family: Arial; font-size: 11pt; text-decoration: underline; font-weight: 600;"><?php echo $winnername ?></h3>
						<ul>
							<li style="background: #161616;text-align: center;">
								<span style="font-family: Arial; font-weight: 500; font-size: 11pt; text-align: center;" class="val"><?php echo $msg[$lang]["win"]; ?>:</span>
								<span style="font-family: Arial; font-weight: 500; font-size: 11pt;text-align: center;color:#ffc600;" class="price">$<?php echo round($winnercost,2); ?></span>
							</li>
							<li style="background: #161616;text-align: center;">
								<span style="font-family: Arial; font-weight: 500; font-size: 11pt; text-align: center;" class="val"><?php echo $msg[$lang]["chance"]; ?>:</span>
								<span style="font-family: Arial; font-weight: 500; font-size: 11pt;text-align: center;color:#ffc600;" class="price"><?php echo $winnerpercent ?>%</span>
							</li>
						</ul>
					</div>
					<div style="background: #1C1C1C;width: 194px;" class="online">
						<h2 style="font-family: Calibri; font-size: 12pt; color: #ffc600; font-weight: 600;"><?php echo $msg[$lang]["online"]; ?></h2>
						<img style="margin-bottom: 20px;" src="image/levaia/online.png">
						<div style="width: 194px; height: 26px; padding-top: 8px; padding-bottom: 0px;  background: #161616;" class="box">
						  <p style="font-family: calibri bold; font-weight: 500; font-size: 13pt;">Online:</p>
						  <span style="color: #ffc600;" "id='on_now'><?php
session_start();
$session=session_id();
$time=time();
$time_check=$time-600; //SET TIME 10 Minute
$tbl_name="user_online"; // Table name
$sql="SELECT * FROM $tbl_name WHERE session='$session'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count=="0"){
$sql1="INSERT INTO $tbl_name(session, time)VALUES('$session', '$time')";
$result1=mysql_query($sql1);
}
else {
"$sql2=UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
$result2=mysql_query($sql2);
}
$sql3="SELECT * FROM $tbl_name";
$result3=mysql_query($sql3);
$count_user_online=mysql_num_rows($result3);
echo "$count_user_online ";
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysql_query($sql4);
?> </span> </div>
						</div>
					
					<div style="padding: 8px; font-size: 14pt; text-align: center;">
						<a href="/" style="color: #eee;" target="_blank"><img src="image/levaia/tex.png"></a>
					</div>

				</div>	
				<div style="padding-right: 1px; padding-left: 1px;width: 742px; float: right;" class="content">
					<div style="width: 742px;background: #2E2E2E;" class="history_game">
						<h2 style="text-decoration: underline;background: #2e2e2e; border-radius: 0px; text-align: left; padding-left: 29px; font-family: Calibri; font-size: 13pt; font-weight: bold;"><?php echo $msg[$lang]["top10"]; ?></h2>
									<img style="margin-left: 27.5px; margin-right: 27.5px;" src="image/p.png">
						<ul style="background: #2E2E2E;">
							<?php
							$rs = mysql_query("SELECT * FROM `users` ORDER BY `won` DESC LIMIT 10");
							$i = 1;
							while($row = mysql_fetch_array($rs)) {
							echo '<li style="border-radius: 0px;border-bottom: 1px #3a3a3a solid;background: #2E2E2E;">
								<div style="border: 0;padding-right: 0px;" class="visual">
									<img style="border: 3px #232323 solid;" src="'.$row["avatar"].'" width="105" height="105">
								</div>
								<div class="list">
									<ul>
										<li style="background: #222222; width: 206px; height: 28px; margin: 0px 0px 7px 0px; text-align: left; padding: 8px 14px 0px; color: #f4be03; font-family: Calibri; font-weight: bold; font-size: 16px;">'.$row["name"].'</li>
										<li style="background: #222222; width: 206px; height: 28px; margin: 0px 0px 7px 0px; text-align: left; padding: 8px 14px 0px; color: #f4be03; font-family: Arial; font-weight: normal; font-size: 16px;">
											<span style="color: #fff; font-size: 13px;">'.$msg[$lang]["winnum"].': </span>
											<span style="color: #F4BE0C; font-size: 14px;" class="price">'.$row["games"].'</span>
										</li>
										<li style="background: #222222; width: 206px; height: 28px; margin: 0px 0px 7px 0px; text-align: left; padding: 8px 14px 0px; color: #f4be03; font-family: Arial; font-weight: normal; font-size: 16px;">
											<span style="color: #fff; font-size: 13px;">'.$msg[$lang]["winamount"].':</span>
											<span style="color: #CC3335; font-size: 14px; class="price">$'.round($row["won"],2).'</span>
										</li>
									</ul>
								</div>
								<div style="width: 115px; padding-top: 0px; padding-bottom: 10px; margin-top: -15px;" class="stuff">
									<div style="width: 154px;height: 76px;background: #2E2E2E" class="rate">
										<p style="font-family: Calibri; font-weight: bold; font-size: 60px; vertical-align: top;" class="win">'.$i.'</p>
									</div>
										<div style="width: 154px;height: 76px;background: #2E2E2E" class="rate">
									<p style="font-family: Calibri; font-weight: bold; font-size: 50px; text-decoration: underline; vertical-align: top;" class="win">место</p>
									</div>
								</div>
								</li>';
								$i++;
							}
								?>
							</ul>
					</div>
						</div>
						<img style="margin-left: 985px; margin-top: -1818px;" src="image/bg.png">
</body>
</html>