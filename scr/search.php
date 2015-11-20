<html >
<head>
<link href="common1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js" ></script>
<title>Scream of soul</title>
<script type="text/javascript">
$(document).ready(function(){
	$('.link-click').on('click', function(e){
		e.preventDefault();
		$(this).parents('.comment-container').find('.comment').toggle();
	});
});
</script></head>
<body>
<div id="main">
  <div id="banner"></div>
    <div id="menu">
      <table  width="1000" bgcolor="#4FC0F0">    
		  <tr valign="middle" bordercolor="blue" border="1" > 
							<th width="200"  height="40"> <a href="index.html"><img src="image/главная.gif"><div id="glavnai"></div></a> </th>
							<th width="200"  height="40"><a href="register.php"><img src="image/регистрация.gif"><div id="register"></div></a> </th>
							<th width="200"  height="40"> <a href="search.php"><img src="image/поиск.gif"><div id="search"></div></a> </th>
							<th width="200"  height="40"><a href="education.html"><img src="image/учеба.gif"><div id="edicaution"></div></a> </th>
		   </tr>
       </table>
	</div>
				<div class="form">
					<div class="container">
						<form id="signup" method="post" >
							<div class="header">
								<h3>Поиск</h3>
							</div>
								<div class="sep"></div>
									<div class="inputs">
										 <div id="q">
												<p>Район:</p>
													<select name="area">
															<option value="1">Дзержинский район</option>
															<option value="2">Киевский район</option>
															<option value="3">Коминтерновский район</option>
															<option value="4">Ленинский район</option>
															<option value="5">Московский район</option>
															<option value="6r">Октябрьский район</option>
															<option value="7">Орджоникидзевкий район</option>
															<option value="8">Фрунзенский район</option>
															<option value="9">Червонозаводский район</option>
													</select>
															<p><font color="white">hkh</font></p>
															<p><font color="white">hkh</font></p>
															<p><font color="white">hkh</font></p>
												<p>Стили:</p>
													<div class="checkboxy"><p>
														<input type="checkbox" id="checky"name="style[]" value="1" >Современные танцы<Br>
													   <input type="checkbox" id="checky"name="style[]" value="2" >Contemporary dance<Br>
													   <input type="checkbox" id="checky"name="style[]" value="3" >Stip-dance<Br> 
													   <input type="checkbox" id="checky"name="style[]" value="4" >Stip-fashion<Br> 
													   <input type="checkbox" id="checky"name="style[]" value="5" >Модерн-джаз<Br> 
													   <input type="checkbox" id="checky"name="style[]" value="6" >Клубный танец<Br> 
														<input type="checkbox"id="checky" name="style[]" value="7" >Бальные танцы<Br> 
														<input type="checkbox" id="checky"name="style[]" value="8" >Бродвейский джаз<Br> </p>
													</div>
										</div>
												<input type="submit" id="submit" name="search" value="Поиск">
										</div>
					</form>
		<?php
								mysql_connect('localhost', 'root') or die(mysql_error());
								mysql_select_db('scool');
								if(isset($_POST['search'])){
									$area = $_POST['area'];
									$style= $_POST['style'];
									$styles=array();
								foreach ($style as $value) {
									$styles[]=$value;
									}
									$style_str = join($styles, ', ');	
									$q = mysql_query("SELECT*FROM `scools` inner join `area` on `scools`.`id_area`=`area`.`id_area` inner join `style` on `scools`.`id_scool`=`style`.`id_scool` WHERE `scools`.`id_area`='$area' or `id_style` IN ($style_str)  GROUP BY `name_scool`;");
								while($row= mysql_fetch_array($q))
								{
			?>
									<form id="signup" class="comment-container">
														<div class="header">
															<h3><?php echo iconv('utf-8', 'cp1251',$row['name_scool']); ?></h3>
														</div>
														<div class="sep"></div>
														<div class="inputs">
															<p>Район:</p>
															<p><font color="red"><?php echo iconv('utf-8', 'cp1251',$row['name_area']); ?></font></p>
															<p>Официальный сайт:</p>
															<p><font color="red"><?php echo $row['site']; ?></font></p>
														</div>
															<p>Контакты:</p>
															<p><font color="red"><?php echo iconv('utf-8', 'cp1251',$row['contact_information']); ?></font></p><br>
															<p><a href="#" class="link-click">Открыть/Закрыть отзывы</a></p>
														<div class="comment">
														<?php
													if(isset($_POST['myForm'])){
														$username=$_POST['username'];
														print_r($_POST['username']);
														$msg=$_POST['msg'];
														$action=$_POST['action'];					
														$sc=$row['id_scool'];
															if ($action=="add"){
																	$r==mysql_query ("INSERT INTO gb(username, dt, msg,id_scool) VALUES ('$username', NOW(), '$msg', '$sc');");
																}
																}
															$c=0;
															$r=mysql_query ("SELECT * FROM gb where `id_scool`='$sc' ORDER BY dt DESC "); 
															while ($row=mysql_fetch_array($r))  {
																	if ($c%2)
																		$col="bgcolor='#f9f9f9'";	
																	else
																		$col="bgcolor='#f0f0f0'";
																		?>
																			<input type="hidden" name="action" value="add">
																			<table border="0" cellspacing="3" cellpadding="0" width="90%" <? echo $col; ?> style="margin: 10px 0px;">
																			<tr>
																				<td width="150" style="color: #999999;">Имя пользователя:</td>
																				<td><?php echo $row['username']; ?></td>
																			</tr>
																			<tr>
																				<td width="150" style="color: #999999;">Дата опубликования:</td>
																				<td><?php echo $row['dt']; ?></td>
																			</tr>	
																			<tr>
																				<td colspan="2" style="color: #999999;">---------------------------------------------------------------</td>
																			</tr>		
																			<tr>
																				<td colspan="2">
																					<?php echo $row['msg']; ?>
																					<br>
																				</td>
																			</tr>
																			</table>
																	<?php
																		$c++;
																			}
																		if ($c==0) 
																		echo "Отзывов нет!Но вы можете стать первым:)<br>";
																	?>
																	<br>
																	<h3>Добавить сообщение</h3>
																	<form name="myForm"  method="post" >
																	<input type="hidden" name="action" value="add">
																	<table border="0">
																		<tr>
																			<td width="160">
																				Имя пользователя:
																			</td>
																			<td>
																				<input name="username" style="width: 300px;">
																			</td>
																		</tr>
																		<tr>
																			<td width="160" valign="top">
																				Сообщение:
																			</td>
																			<td>
																				<textarea name="msg" style="width: 300px;"></textarea>
																			</td>
																		</tr>		
																		<tr>
																			<td width="160">
																				&nbsp;
																			</td>
																			<td>
																				<input type="submit" value="Отправить сообщение">
																			</td>
																		</tr>
													</table>
									</form>
				</div>
	</form>							
		<?php
		}
		}
		?>						
			<br>
		</div>	
	 </div>
</body>
</html>