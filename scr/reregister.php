<?php	
	mysql_connect('localhost', 'root') or die(mysql_error());
	mysql_select_db('scool');
	

	// authorization
	if(isset($_POST['auth'])){
					if (($_POST['name']=="")&&($_POST['password']=="")) {
					echo ("<h1 align=center>��� ���� ������ ���� ���������!!!\n</h1>");
			}											
		else{
				$name = $_POST['name'];
												
				$password = $_POST['password'];
				$row = mysql_query("SELECT *FROM  `scools`  inner join `area` on  `scools`.`id_area`=`area`.`id_area` WHERE `name_scool` = '$name';");
				$user_data = mysql_fetch_array($row);
				if($user_data['password']==$password){
					session_start();
					$_SESSION['name'] = $name; }
				else {
					echo "�� ��������� ������ ������ ��� ����� ";
						}
			}
							}
	// update
	if(isset($_POST['save'])){
		session_start();					
		$s=$_SESSION['name'];
		$new_scool_name = $_POST['new_scool_name'];
		$new_password = $_POST['new_password'];
		$new_web_site = $_POST['new_web_site'];
		$new_inform = $_POST['new_inform'];
		$new_contact_information = $_POST['new_contact_information']; 
		$area = $_POST['new_area'];
		$style= $_POST['style'];
		switch($area){
				case 'DZ':$query = mysql_query("UPDATE `scools` SET `id_area`='1' ,`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Kiev':$query = mysql_query("UPDATE `scools` SET `id_area`='2' ,`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Komin': $query = mysql_query("UPDATE `scools` SET `id_area`='3' ,`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Lenin':$query = mysql_query("UPDATE `scools` SET `id_area`='4',`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Moskva':$query = mysql_que("UPDATE `scools` SET `id_area`='5',`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'October':$query = mysql_query("UPDATE `scools` SET `id_area`='6' ,`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Ord':$query = mysql_query("UPDATE `scools` SET `id_area`='7', `name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Frun':$query = mysql_query("UPDATE `scools` SET `id_area`='8', `name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				case 'Cherv':$query = mysql_query("UPDATE `scools` SET `id_area`='9' ,`name_scool`='$new_scool_name', `password`='$new_password',`site`='$new_web_site',`inform`='$new_inform',`contact_information`='$new_contact_information ' WHERE `name_scool`='$name');");break;
				}
		$p=mysql_query("SELECT  `id_scool` FROM  `scools` WHERE  `name_scool` ='$s'");
		$r= mysql_fetch_array($p);
		$id = $r['id_scool'];		
		$z=mysql_query(" Delete from `style`  WHERE `id_scool` = '$id'");
		if (is_array($style)) {
			foreach ($style as $value) {
				$style_number = (int)$value;
				$q = mysql_query(" INSERT INTO `style` (`id_style`, `id_scool`) VALUES ('$style_number', '$id')");
							}
				}
			unset($_SESSION['name']);
			session_destroy();						
	}
?>
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
				         <th width="200"  height="40"> <a href="index.html"><img src="image/�������.gif"><div id="glavnai"></div></a> </th>
						<th width="200"  height="40"><a href="register.html"><img src="image/�����������.gif"><div id="register"></div></a> </th>
						<th width="200"  height="40"> <a href="search.php"><img src="image/�����.gif"><div id="search"></div></a> </th>
						<th width="200"  height="40"><a href="education.html"><img src="image/�����.gif"><div id="edicaution"></div></a> </th>
				   </tr>
			 </table>
			</div>	
			<div class="form">
		<div class="container">
		<script>
			function splash(){
				if (document.signup.name.value  =='')
					{
						alert ("��������� ��� ������������!");
						return false;	
					}
					
				if (document.signup.password.value  =='')
					{
						alert ("��������� ����� ���������!");
						return false;	
					}
				
				return true;   
			}
</script>
    <form id="signup" method="post" onSubmit="return splash();">
        <div class="header">
            <h3>�����������</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs" align="center">
            <input type="text" name="name" placeholder="�������� �����" autofocus /><br>
			<p></p>
            <input type="password" name="password" placeholder="������� ������" />
            <input id="submit" name="auth" type="submit" value="����">
      
        </div>
    </form>
<?php	
			// authorization
			if(isset($_POST['auth'])){ ?>
				<div id="box" style="display: block;">
				<form id="signup" method="post" >
				<div class="header">
					<h3>�������� ������</h3>
				</div>
					<div class="sep"></div>
					 <div class="inputs">
					 <div id="q">
					 <p>������� �������� �����:</p>
							<p><font color="red" size="4"><?php echo $user_data['name_scool']; ?></font></p><br>
							<input type="text" placeholder="������� ����� �������� �����" name="new_scool_name"><br>
							<p>�����:</p>
							<p><font color="red" size="4"><?php echo iconv('utf-8', 'cp1251', $user_data['name_area']);?></font></p><br>
							<p>�������� ����� �����:</p>
								<select name="new_area">
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
								<p>����������� ����:</p>
							<p><font color="red" size="4"><?php echo $user_data['site'];?></font></p><br>
							<input type="email"placeholder="������ ����� e-mail" name="new_web_site">
							<br>
							<p>������� ����� ������ ������:</p>
							 <input type="password" name="new_password">
								<p>��������:</p>
									<p><font color="red" size="4"><?php echo $user_data['contact_information'];?></font></p><br>
								<input type="text" placeholder="������� ����� ������ ����� � ����� ��������" name="new_contact_information">
						       <p>�����:</p>
							 <?php  
							 $query = mysql_query("SELECT  `style`.`id_style` FROM  `style`  inner join `scools` on  `scools`.`id_scool`=`style`.`id_scool` WHERE `name_scool` = '$name';");
								$styles=array();
								while($row= mysql_fetch_array($query))	{
										$styles[]=$row['id_style'];
								}						
							 ?>
							<div class="checkboxy"><p>
									<input type="checkbox" id="checky"name="style[]" value="1" <?php echo in_array(1, $styles )? 'checked':'' ?>>������ + ������ <Br>
								   <input type="checkbox" id="checky"name="style[]" value="2"<?php echo in_array(2, $styles )? 'checked' : '' ?> >������� �����<Br>
								   <input type="checkbox" id="checky"name="style[]" value="3"<?php echo in_array(3, $styles ) ? 'checked' : '' ?> >�������� �����<Br> 
								   <input type="checkbox" id="checky"name="style[]" value="4"<?php echo in_array(4, $styles ) ? 'checked' : '' ?> >����������� � ��������� �����<Br> 
								   <input type="checkbox" id="checky"name="style[]" value="5"<?php echo in_array(5, $styles ) ? 'checked' : '' ?> >������/�������/���� <Br> 
								   <input type="checkbox" id="checky"name="style[]" value="6" <?php echo in_array(6, $styles ) ? 'checked' : '' ?>>������� �����<Br> 
									<input type="checkbox"id="checky" name="style[]" value="7"<?php echo in_array(7, $styles )? 'checked' : '' ?> >������� ����� <Br> 
									<input type="checkbox" id="checky"name="style[]" value="8"<?php echo in_array(8, $styles ) ? 'checked' : '' ?> >����/�������/��������� <Br> </p>
								 </div>
							<p>���������� � �����:</p>
							<p><font color="red" size="4"><?php echo $user_data['inform'];?></font></p><br>
							<input type="text"placeholder="������� ����� ���������� � �����" name="new_inform">
								</div>
								<input id="submit"  name="save" type="submit" value="��������� � �����">
					</div>
			</form>
		</div>						
		<?php 
			} 
		?>				
			<br>
		</div>	
	</div>
</div> 
</body>
</html>