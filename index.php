<?php
@include_once "langdoc.php";
if(!isset($_COOKIE['lang'])) {
	setcookie("lang","ru",2147485547);
	$lang = "ru";
} else $lang = $_COOKIE["lang"];
$sitename = "CSGOBET.US - Лотерея скинов CS GO";
$title = "$sitename";
@include_once('set.php');
require('steamauth/steamauth.php');
	if(isset($_SESSION["steamid"])) {
include_once('steamauth/userInfo.php');}
?>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
 <link rel="icon" type="image/png" href="/img/fav.png"/>
 <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/chat.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
 <script src="js/progressbar.js"></script>
 <script src="js/main.js"></script>
    <script src="js/chat.js"></script>

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
					<img style="margin-left: 742px; margin-top: -81px;" src="image/bg.png">
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
							<li style="padding-top: 0px; padding-bottom: 0px; width: 192px; height: 34px; background: url(image/levaia/6.png); font-size: 10pt; font-family: Arial; text-align: left; margin-bottom: 6px;"><a style="padding-left: 45px;background: none;padding-top: 4px;" <a href="https://vk.com/csgobetus" target="_blank"><?php echo $msg[$lang]["vk"]; ?></a></li>
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
				<?php 
						$result = mysql_query("SELECT MAX(cost) AS cost FROM games");
						$row = mysql_fetch_assoc($result);
						$maxcost =  $row["cost"];
						?>
						<!--div class="here">
							<a href="https://vk.com/csgobetus" target="_blank"><img src="img/mega.jpg" style="opacity: 75;width: 864px;" class="img-responsive" alt="Прими участие в розыгрыше в группе VK!"></a>
						</div-->
						<div style="background: #353535;height: 480px;" class="game">
						<div style="background: url(image/info/fon.png); padding-bottom: 30px;background-color: #202020;height: 470px;">
											<div style="padding-left: 21px; padding-right: 21px; padding-top: 27px; margin-bottom: 28px;" class="items">
							<ul style="padding-left: 9px;">
								<li style="background: #fff; border: 1px #ececec solid; width: 152px; height: 121px; margin-right: 17px;">
									<div style="background: #fff;" class="visual">
										<img style="padding-left: 4px;padding-right: 3px;" src="/image/stavka/1.png" alt="image description">
									</div>
									<div style="background: #FFFFFF;" class="text">
										<strong style="color: #333333;"><?php
											$result = mysql_query("SELECT id FROM games WHERE `starttime` > ".(time()-86400));
											echo mysql_num_rows($result);
										?></strong>
										<p style="color: #333333;"><?php echo $msg[$lang]["gtd"]; ?></p>
									</div>
								</li>
								<li style="background: #fff; border: 1px #ececec solid; width: 152px; height: 121px; margin-right: 17px;">
									<div style="background: #fff;" class="visual">
										<img style="padding-left: 4px;padding-right: 3px;" src="/image/stavka/2.png" alt="image description">
									</div>
									<div style="background: #FFFFFF;" class="text">
																			<strong style="color: #333333;"><?php
										$row = mysql_fetch_array($result);
										$pls = 0;
										$itms = 0;
										for($i=$row["id"]; $i <= $lastgame; $i++) {
											$rst = mysql_query("SELECT id FROM game".$i." GROUP BY userid");
											$pls += mysql_num_rows($rst);
										}
										echo $pls;
										?></strong>
										<p style="color: #333333;"><?php echo $msg[$lang]["ptd"]; ?></p>
									</div>								
								</li>
								<li style="background: #fff; border: 1px #ececec solid; width: 152px; height: 121px; margin-right: 16px;">
									<div style="background: #fff;" class="visual">
										<img style="padding-left: 4px;padding-right: 3px;" src="/image/stavka/3.png" alt="image description">
									</div>
									<div style="background: #FFFFFF;" class="text">
																		<strong style="color: #333333;"><?php
									$result = mysql_query("SELECT SUM(itemsnum) AS itemsnum FROM games WHERE `starttime` > ".(time()-86400));
									$row = mysql_fetch_assoc($result);
									echo $row["itemsnum"];
									?></strong>
										<p style="color: #333333;"><?php echo $msg[$lang]["itd"]; ?></p>
									</div>
								</li>
								<li style="background: #fff; border: 1px #ececec solid; width: 152px; height: 121px;">
									<div style="background: #fff;" class="visual">
										<img style="padding-left: 4px;padding-right: 3px;" src="/image/stavka/4.png" alt="image description">
									</div>
									<div style="background: #FFFFFF;" class="text">
										<strong style="color: #333333;"><?php echo round($maxcost,2); ?> $</strong>
										<p style="color: #333333;"><?php echo $msg[$lang]["mwin"]; ?></p>
									</div>
								</li>
							</ul>
						</div>
							<div style="width: 679px; margin-left: 30.5; margin-right: 30.5;  border: 1px solid #ececec; height: 245px;  background-color: #ffffff;  padding: 0;" class="progress">
															<div style="background-color: #f8f8f8; float: none; width: 136px; height: 50px; padding-left: 0px; margin-left: 271.5; margin-right: 271.5; border: 1px solid #ececec; border-top: 0;" class="number">
									<p style="font-family: Calibri; font-weight: bold; color: #353535; font-size: 13pt; margin-bottom: 0px; padding-top: 7px;"><?php echo $msg[$lang]["game"]; ?>: <span style="color:37ae31;" class="lot_current_game_id">#<?php echo $lastgame; ?></span></p>
								</div>
								
								<div style="padding: 0;margin-top: 20px;width: 100%;" class="amount">
								<p style="padding-right: 158px; font-weight: normal; font-family: Arial; color: #353535; font-size: 10pt; text-align: center; float: right;"><?php echo $msg[$lang]["winsum"]; ?> <b style="font-weight: 500; font-family: Arial; color: #353535; font-size: 11pt;">$<?php echo round(fetchinfo("cost","games","id",$lastgame),2); ?></b></p>
								<span style="padding-left: 0px; padding-top: 11px; float: left; font-family: Calibri; font-weight: 300; font-size: 12pt; padding-right: 0px; margin-right: 0px; margin-left: -36px;" id="end_game1" class="end_game"><?php echo $msg[$lang]["timeleft"]; ?>: <i style="background: url(../image/time.png) 0px no-repeat;" class="ico"></i><b style="font-family: Calibri; font-weight: 300; font-size: 12pt;color: #353535;">Осталось:</b> <span style="color: #353535;" id="timeleft">0</span><b style="font-family: Calibri; font-weight: 300; font-size: 12pt;color: #353535;"> Секунд</b></span>
								<span id="end_game2" class="end_game" style="font: 500 15px/15px 'Roboto', sans-serif;"></span>
								</div>
							<div style="position: absolute;border: 0;  float: none;display: none;" class="visual">
								<div id="prograsd" style="position: relative;"><p class="progressbar__label" style="position: absolute; top: 50%; left: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(238, 238, 238);">0/50</p></div>
								
							</div>
							<div>
							</div>
							<div style="margin-left: -5px;" id="load_div">	
							<div id="container" style="margin-left: 28px;width: 494px; height: 30px; border: 4px solid black; background: #353535;">
  <div id="progress-bar" style="width:0%; background: #37ae31;height: 30px;"><p class="progressbar__label" style="position: absolute; padding: 0px; transform: translate(-50%, -50%); color: rgb(238, 238, 238); font-size: 18px; margin-left: 240px; margin-top: 15px;">0/100</p>
  </div>
</div>	</div>
							<div style="float: right;background: #fafafa;width: 108px; height: 38px;padding:0;  border: 1px solid #e7e7e7;margin-right: 21px;" class="rate">
								<p style="height: 38px; font-weight: bold; font-family: Arial; color: #353535; font-size: 11pt; text-align: center;margin-top: 2px;"><?php echo $msg[$lang]["chance"]; ?>: <span style="font-family: Calibri Lite;font-weight: lite;" id="mychance">0%</span></p>
								<div id="first_chance10" style="margin-left: 50px; clear: both; font-size: 15pt; font-weight: bold; color: #f9d300;">&nbsp;</div>
							</div>

													<?php
						if(!isset($_SESSION["steamid"])) echo '<div style="float: right; width: 145px; background: #cb3434; height: 42px; margin-top: 18px; margin-left: 0px; padding-top: 0px; margin-right: -110px;" id="add_game"><a style="width: 145px; background: #cb3434; border: 0; height: 42px; font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center; padding-top: 0px;margin-top: 0px; margin-bottom: 0px;" class="btwn_game" href="?login"><p style="font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center;margin-bottom: 0px; padding-top: 2px;text-shadow: none;">'.$msg[$lang]["ingame"].'</p></a></div>';
						else {
							$token = fetchinfo("tlink","users","steamid",$_SESSION["steamid"]);
							if(strlen($token) < 2) echo '<div style="float: right; width: 145px; background: #cb3434; height: 42px; margin-top: 18px; margin-left: 0px; padding-top: 0px; margin-right: -110px;" id="add_game"><a style="width: 145px; background: #cb3434; border: 0; height: 42px; font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center; padding-top: 0px;margin-top: 0px; margin-bottom: 0px;" class="btwn_game" href="#" onclick="alert2(\'Укажите ссылку для обмена в настройках!\')"><p style="font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center;margin-bottom: 0px; padding-top: 2px;">'.$msg[$lang]["ingame"].'!</p></a></div>';
							else echo '<div style="float: right; width: 145px; background: #cb3434; height: 42px; margin-top: 18px; margin-left: 0px; padding-top: 0px; margin-right: -110px;" id="add_game"><a style="width: 145px; background: #cb3434; border: 0; height: 42px; font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center; padding-top: 0px;margin-top: 0px; margin-bottom: 0px;" class="btwn_game" href="https://steamcommunity.com/tradeoffer/new/?partner=48716858&token=pZ88rK2H" target=_blank><p style="font-size: 12pt; font-family: calibri; font-weight: bold; text-align: center;margin-bottom: 0px; padding-top: 2px;">'.$msg[$lang]["ingame"].'!</p></a></div>';
						}
						?>
						</div>
						</div>
																				<?
							$spisok1 = "SELECT value FROM info WHERE name = 'maxitems';";
$spisok = mysql_query($spisok1) or die('Ошибка БД');
while ($row = mysql_fetch_array($spisok, MYSQL_NUM)) {
     echo '<p style="margin-top: -145px; margin-bottom: 0px; margin-left: 65px;font: 14px Calibri;">Максимальный депозит: <b style="font: 14px Calibri;color: #37ae31; font-weight: normal;">'.$row[0].' предметов</b>';
}							 
?>
																				<?
							$spisok1 = "SELECT value FROM info WHERE name = 'minbet';";
$spisok = mysql_query($spisok1) or die('Ошибка БД');
while ($row = mysql_fetch_array($spisok, MYSQL_NUM)) {
     echo '<p style="margin-top: 1px; margin-bottom: 0px; margin-left: 65px;font: 14px Calibri;">Минимальная сумма депозита: <b style="font: 14px Calibri;color: #cb3434; font-weight: normal;">$'.$row[0].'</b>';
}							 
?>

						<div style="margin-top: 60px;background: #202020;" class="stuffs promo-cover">
						<ul id="game-sts" style="display: block;">
							<div class=rounditemsroul><?php 
							?></div>
							<div class=rounditems><?php 
								include "items.php";
							?></div>
																	<li class="orange" style="margin-top: -5px;min-height: 80px; width: 100%; text-align: center;">
										<div class="text" style="background: #202020;min-height: 80px; padding: 0;">
											<p style="font-size: 24pt; font-weight: bold; min-height: 40px; vertical-align: middle; padding: 20px 0 0 0;"></p>
										</div>
									</li>
								</ul>
						</div>			
</body>
</html>