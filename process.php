<?php
$link=mysql_connect('localhost','gdgtst','gdgtst01');
if(!$link) {
die('Could not connect: '.mysql_error());
}
mysql_select_db('gdgtst');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
$description=$_POST['description'];
$usrname=$_POST['usrname'];
$artname=$_POST['artname'];
$contents=$_POST['contents'];
$comment=$_POST['comment'];
$receiver=$_POST['receiver'];
$sender=$_POST['sender'];
$title=$_POST['title'];
$email=$_POST['email'];
$name=$_POST['name'];
$memo=$_POST['memo'];
$mode=$_POST['mode'];
$tab=$_POST['tab'];
$uid=$_GET['uid'];
$no=$_POST['no'];
$id=$_POST['id'];
$pw=$_POST['pw'];
if(!empty($uid)){
	$sql = "SELECT * From mem where id =". $uid;
	$result = mysql_query($sql);
	$u_data = mysql_fetch_assoc($result);
}
$u_name=$u_data['usrname'];
echo '<pre>';
print_r($_GET);
echo '</pre>';
echo '<pre>';
print_r($_POST);
echo '</pre>';

if ($mode == "add") {
$sql = "INSERT INTO art (tab,title, description, usrname, created) VALUES('$tab','$title', '$description', '$u_name', NOW())";
mysql_query($sql);}

elseif ($mode == "mod") {
$sql = "UPDATE art SET tab='$tab', title='$title', description='$description', modtime=NOW() WHERE no=$no";
mysql_query($sql);
}

elseif ($mode == "del") {
$sql = "DELETE FROM art WHERE no=$no";
mysql_query($sql);
}

if ($mode == "mem") {
$sql = "INSERT INTO mem (usrname, pw, name, email, memo, created) VALUES('$usrname','$pw', '$name', '$email', '$memo', NOW())";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?\";
				</script>
			</head>
		</html>";
}

if ($mode == "m_mem") {
$sql = "UPDATE mem set usrname='$usrname', pw='$pw', name='$name', email='$email', memo='$memo where id=$uid";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?uid={$uid}\";
				</script>
			</head>
		</html>";
}

if ($mode == "log") {
$sql = "Select * from mem Where usrname='$usrname' and pw='$pw'";
$result=mysql_query($sql) or die(mysql_error());
$count=mysql_num_rows($result);

if($count==1){
mysql_query("UPDATE mem SET attend = attend + 1 WHERE usrname='$usrname'");
$row = mysql_fetch_assoc($result);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다. 돌아가기를 클릭하세요');
				</script>
				<form action=\"index.php\" method=\"get\">
        <input type=\"hidden\" name=\"uid\" value=\"{$row['uid']}\" />
<button onclick=\"javascript_: location.href='index.php?';\">
		돌아가기
	</button>
</form>
			</head>
		</html>";
}
else{
	echo "
		<html>
			<body>
			<script>
			alert('아이디와 비밀번호를 다시 확인해 주십시오');
			</script>
				실패, ".mysql_error()."
			</body>
		</html>";
}
}


if ($mode == "msg") {
$sql = "INSERT INTO msg (sender, receiver, title, contents, created) VALUES('$sender', '$receiver', '$title', '$contents', NOW())";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?uid={$uid}\";
				</script>
			</head>
		</html>";
}

if ($mode == "a_cat") {
$sql = "INSERT INTO cat (tab, description, created) VALUES('$tab', '$description', NOW())";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"admin.php?\";
				</script>
			</head>
		</html>";
}

elseif ($mode == "com") {
$sql = "INSERT INTO com (tab, no ,comment, usrname, artname, created) VALUES('$tab','$no', '$comment', '$u_name','$artname', NOW())";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?tab=$tab&no={$no}&uid={$uid}\";
				</script>
			</head>
		</html>";
}

elseif ($mode == "c_mod") {
$sql = "UPDATE com SET comment='$comment', modtime=NOW() WHERE id=$id";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?tab=$tab&no={$no}&uid={$uid}\";
				</script>
			</head>
		</html>";
}

elseif ($mode == "c_del") {
$sql = "DELETE FROM com WHERE id=$id";
mysql_query($sql);
echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?tab=$tab&no={$no}&uid={$uid}\";
				</script>
			</head>
		</html>";
}


if(empty($count)&mysql_affected_rows()==1){
	echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?tab=$tab&uid={$uid}&no=".mysql_insert_id()."\";
				</script>
			</head>
		</html>";
} 
/*-else 문을 elseif으로 변경  로그인 하나 때문에-*/
elseif (empty($count)){
	echo "
		<html>
			<body>
				실패, ".mysql_error()."
			</body>
		</html>";
}
?>