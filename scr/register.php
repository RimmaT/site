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
				         <th width="200"  height="40"><a href="index.html"> <div id="glavnai"><img src="image/�������.gif"></div></a> </th>
						<th width="200"  height="40"><a href="register.php"><div id="register"><img src="image/�����������.gif"></div></a> </th>
						<th width="200"  height="40"> <a href="search.php"><div id="search"><img src="image/�����.gif"></div></a> </th>
						<th width="200"  height="40"><div id="edicaution"><a href="education.html"><img src="image/�����.gif"></div></a> </th>
				   </tr>
			 </table>
			</div>	
			<div class="form">
						<?php
								mysql_connect('localhost', 'root') or die(mysql_error());
								mysql_select_db('scool');
								if(isset($_POST['register'])){
											if (($_POST['scool_name']=="")&&($_POST['web_site']=="")&&($_POST['password']=="")) {
											echo '<div align="center"><H1>���� ����� ���: �������� �����,���� � ������ ������ ���� ����������� ���������!!!<H1/></div>';
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
											<h1>����������� ������ �������!!!<br>� ����� ������ ������������ ����� �������� ������,����������!</h1>
											</div>';
										}	
				}
								?>
								<div class="container">
									<form id="signup" method="post" >
											<div class="header">
												<h3>�������� �����������</h3>
											</div>
											<div class="sep"></div>
											<div class="inputs">
												 <div id="q">
													<p><font color="white">hkh</font></p>
													<p>��������:</p>
													<input type="text" placeholder="������� �������� �����" name="scool_name"><br>
													<p>�����:</p>
															<select name="area">
																<option value="DZ">����������� �����</option>
																<option value="Kiev">�������� �����</option>
																<option value="Komin">��������������� �����</option>
																<option value="Lenin">��������� �����</option>
																<option value="Moskva">���������� �����</option>
																<option value="October">����������� �����</option>
																<option value="Ord">���������������� �����</option>
																<option value="Frun">����������� �����</option>
																<option value="Cherv">���������������� �����</option>
															</select>
													<p>�����:</p>
														<div class="checkboxy"><p>
																<input type="checkbox" id="checky"name="style[]" value="1" >������ + ������ <Br>
																<input type="checkbox" id="checky"name="style[]" value="2" >������� �����<Br>
																<input type="checkbox" id="checky"name="style[]" value="3" >�������� �����<Br>
																<input type="checkbox" id="checky"name="style[]" value="3" >�������� �����<Br> 
																<input type="checkbox" id="checky"name="style[]"  value="4" >����������� � ��������� �����<Br> 
																<input type="checkbox" id="checky"name="style[]" value="5" >������/�������/���� <Br> 
																<input type="checkbox" id="checky"name="style[]" value="6" >������� �����<Br> 
																<input type="checkbox"id="checky" name="style[]" value="7" >������� ����� <Br> 
																<input type="checkbox" id="checky"name="style[]" value="8" >����/�������/��������� <Br> </p>
														</div>
														<p><font color="white">hkh</font></p>
														 <p><font color="white">hkh</font></p>
														<p>����������� ����:</p>
														<input type="email"placeholder="e-mail" name="web_site">
														<p></p>
														<p>������� ������:</p>
														 <input type="password" name="password">
														 <p>��������:</p>
														<input type="text" placeholder="������� ������ ����� � ����� ��������" name="contact_information">
														<p>���������� � �����:</p>
														<input type="text"placeholder="� �����" name="inform">
								</div>

														<input type="submit" id="submit" name="register" value="������������������">
												</div>
									</form>
							</div>
				<br>
			</div>
	</div> 
</body>
</html>