<html>
<head>
<meta charset="UTF-8">
<link href="common1.css" rel="stylesheet" type="text/css" />
<title>Scream of soul</title>	
</head>
	<body>
		<div id="main">
		  <div id="banner"></div>
			<div id="menu">
			  <table  width="1000" bgcolor="#4FC0F0">    
				  <tr valign="middle" bordercolor="blue" border="1" > 
				         <th width="200"  height="40"><a href="index.html"> <div id="glavnai"><img src="image/главная.gif"></div></a> </th>
						<th width="200"  height="40"><a href="register.php"><div id="register"><img src="image/регистрация.gif"></div></a> </th>
						<th width="200"  height="40"> <a href="search.php"><div id="search"><img src="image/поиск.gif"></div></a> </th>
						<th width="200"  height="40"><div id="edicaution"><a href="education.html"><img src="image/учеба.gif"></div></a> </th>
				   </tr>
			 </table>
			</div>	
			<div class="form">
						<?php
								mysql_connect('localhost', 'root') or die(mysql_error());
								mysql_select_db('scool');
								if(isset($_POST['register'])){
											if (($_POST['scool_name']=="")&&($_POST['web_site']=="")&&($_POST['password']=="")) {
											echo '<div align="center"><H1>Поля такие как: название школы,сайт и пароль должны быть обязательно заполнены!!!<H1/></div>';
								}else{
									$scool_name = $_POST['scool_name'];
									$area = $_POST['area'];
									$password = $_POST['password'];
									$web_site = $_POST['web_site'];
									$inform = $_POST['inform'];
									$contact_information = $_POST['contact_information']; 
									switch($area){
										case 'DZ':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 1, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Kiev':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 2, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Komin': $query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 3, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Lenin':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 4, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Moskva':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 5, '$web_site', '$contact_information','$inform','$password');");break;
										case 'October':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 6, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Ord':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 7, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Frun':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 8, '$web_site', '$contact_information','$inform','$password');");break;
										case 'Cherv':$query = mysql_query("INSERT INTO scools (`name_scool`,`id_area`, `site`, `contact_information`,`inform`,`password`) VALUES ('$scool_name', 9, '$web_site', '$contact_information','$inform','$password');");break;
									}
									$style= $_POST['style'];
									$school_number = mysql_insert_id();
									if (is_array($style)) {
											foreach ($style as $value) {
											$style_number = (int)$value;
											$q = mysql_query("INSERT INTO `style` (`id_style`, `id_scool`) VALUES ('$style_number', '$school_number')");
															}
									}
									echo '
											<div  align="center">
											<h1>Регистрация прошла успешно!!!<br>К вашей записи пользователь может оставить отзывы,проверяйте!</h1>
											</div>';
										}	
				}
								?>
								<div class="container">
									<form id="signup" method="post" >
											<div class="header">
												<h3>Пройдите регистрацию</h3>
											</div>
											<div class="sep"></div>
											<div class="inputs">
												 <div id="q">
													<p><font color="white">hkh</font></p>
													<p>Название:</p>
													<input type="text" placeholder="Введите название школы" name="scool_name"><br>
													<p>Район:</p>
															<select name="area">
																<option value="DZ">Дзержинский район</option>
																<option value="Kiev">Киевский район</option>
																<option value="Komin">Коминтерновский район</option>
																<option value="Lenin">Ленинский район</option>
																<option value="Moskva">Московский район</option>
																<option value="October">Октябрьский район</option>
																<option value="Ord">Орджоникидзевкий район</option>
																<option value="Frun">Фрунзенский район</option>
																<option value="Cherv">Червонозаводский район</option>
															</select>
													<p>Стили:</p>
														<div class="checkboxy"><p>
																<input type="checkbox" id="checky"name="style[]" value="1" >Латина + Карибы <Br>
																<input type="checkbox" id="checky"name="style[]" value="2" >Бальные танцы<Br>
																<input type="checkbox" id="checky"name="style[]" value="3" >Народные танцы<Br>
																<input type="checkbox" id="checky"name="style[]" value="3" >Народные танцы<Br> 
																<input type="checkbox" id="checky"name="style[]"  value="4" >Эротические и Восточные танцы<Br> 
																<input type="checkbox" id="checky"name="style[]" value="5" >Модерн/Контемп/Джаз <Br> 
																<input type="checkbox" id="checky"name="style[]" value="6" >Клубный танец<Br> 
																<input type="checkbox"id="checky" name="style[]" value="7" >Уличные танцы <Br> 
																<input type="checkbox" id="checky"name="style[]" value="8" >Йога/Пилатес/Стретчинг <Br> </p>
														</div>
														<p><font color="white">hkh</font></p>
														 <p><font color="white">hkh</font></p>
														<p>Официальный сайт:</p>
														<input type="email"placeholder="e-mail" name="web_site">
														<p></p>
														<p>Введите пароль:</p>
														 <input type="password" name="password">
														 <p>Контакты:</p>
														<input type="text" placeholder="Введите точный адрес и номер телефона" name="contact_information">
														<p>Информация о школе:</p>
														<input type="text"placeholder="О школе" name="inform">
								</div>

														<input type="submit" id="submit" name="register" value="Зарегистрироваться">
												</div>
									</form>
							</div>
				<br>
			</div>
	</div> 
</body>
</html>