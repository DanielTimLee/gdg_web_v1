<?php
// 1. 데이터베이스 서버에 접속
$link = mysql_connect('localhost', 'gdgtst', 'gdgtst01');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('gdgtst');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
$tab=$_GET['tab'];
$no=$_GET['no'];
$act=$_POST['act'];
$comment=$_POST['comment'];
$id=$_POST['id'];
if (!empty($_GET['no'])) {
	$sql = "SELECT * FROM art WHERE no ="  . $_GET['no'];
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
}
?>
<div style="border-right:2px solid #ccc;background-color: #f6f6f6;padding:0 10px;float:left;min-height:800px">
	 <a href="index.php"><img src="img/logo.jpg" style="height:74px;float:left"/>
	<FORM action="admin.php" METHOD="post" NAME="a_cat" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="a_cat">
     	<a href="admin.php" onClick="document.a_cat.submit();return false">카테고리 관리하기</a>
  	</FORM>
  	<FORM action="admin.php" METHOD="post" NAME="a_art" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="a_art">
     	<a href="admin.php" onClick="document.a_art.submit();return false">게시글 관리하기</a>
  	</FORM>
  	<FORM action="admin.php" METHOD="post" NAME="a_com" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="a_com">
     	<a href="admin.php" onClick="document.a_com.submit();return false">덧글 관리하기</a>
  	</FORM>
  	<FORM action="admin.php" METHOD="post" NAME="l_msg" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="l_msg">
     	<a href="admin.php" onClick="document.l_msg.submit();return false">쪽지 관리하기</a>
  	</FORM>
  	<FORM action="admin.php" METHOD="post" NAME="a_mem" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="a_mem">
     	<a href="admin.php" onClick="document.a_mem.submit();return false">회원 관리하기</a>
  	</FORM>
  	<FORM action="admin.php" METHOD="post" NAME="" style="text-align: center;">
       <INPUT TYPE="HIDDEN" NAME="act" VALUE="">
     	<a href="admin.php" onClick="document..submit();return false">돌아가기</a>
  	</FORM>
</div>
<div style="background-color: #f6f6f6; min-height:950px">
<!--관리자 페이지에 오신 걸 환영합니다. -->
<?php if (empty($act)){
	?>
	<h1>관리자님!<br>Admin Page에 오신 걸 환영합니다!</h1>
	<br><br><br><br><h3>하실 작업을 선택해 주세요</h3>
<?php } ?>
<?php require"admin_func.php" ?>
</div>