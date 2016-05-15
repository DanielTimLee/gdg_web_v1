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
$uid=$_GET['uid'];
$no=$_GET['no'];
$act=$_POST['act'];
$comment=$_POST['comment'];
$id=$_POST['id'];
if(!empty($uid)){
	$sql = "SELECT *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) From mem where id =". $uid;
	$result = mysql_query($sql);
	$u_data = mysql_fetch_assoc($result);
}
$usrname=$u_data['usrname'];
if (!empty($_GET['no'])) {
	$sql = "SELECT * FROM art WHERE no ="  . $_GET['no'];
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
    </head>
    
    <body>
        <div id="header">
            <nav> <a href="index.php?uid=<?=$uid?>"><img src="img/log.png" style="height:74px;float:left"/></a>

                <ul>
                	<?php
					$sql = "select tab from cat";
					$result = mysql_query($sql);
					while ($row = mysql_fetch_assoc($result))
					{ echo "<a href=\"index.php?tab={$row['tab']}&uid={$uid}\">{$row['tab']}</a>";}
                    ?>
                    
                    <li class="search" style="padding-left:40px;width:140px;margin-top:0px;float:right;">
                        <form action="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>" method="post">
                        	<INPUT TYPE="HIDDEN" NAME="act" VALUE="s_all">
                            <input style="border-radius:3px;background:#64cbf9;border:0;border:1px solid #fff" type="type" name="search" value="">
                        </form>
                    </li>
                    
          	     </ul>
            </nav>
        </div>
        <div id="sla">
            <div class="wrap">	<span id="w_line">
						GDG SSU <span class="line">&gt;</span> 웹 서비스 만들기 &gt; <?=$tab?> </span>
            
            </div>
            
        </div>
       
        <div style="background-color: #f6f6f6; height:1000px">
        	<div id="contentwrap" style="float:left">
        	<h1 style="text-align:center;"><?=$tab?></h1>
        	<h3 style="text-align:center;">
        			<?php
					$sql = "select description from cat Where tab='$tab'";
					$result = mysql_query($sql);
					$de = mysql_fetch_assoc($result)
                    ?>
        		<?=$de['description']?></h3>
        	
        	
			<?php require 'func.php'?>
			<?php echo $_GET['$sid'];
			if(!empty($_GET['sid'])) { require 'member_view.php'; } ?>
			<?php require 'search.php'?>
			<div class='content2' style="float:right">
        		<?php if(empty($no)){
        			require 'member.php';}?>
    		</div>
        	</div>
        	
    	</div>
        	<div></div>
    </body>

</html>