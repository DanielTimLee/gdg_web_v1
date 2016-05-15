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
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
    </head>
    
    <body>
        <div id="header">
            <nav> <a href="index.php"><img src="img/log.png" style="height:74px;float:left"/></a>

                <ul>
                	<?php
					$sql = "select tab from cat";
					$result = mysql_query($sql);
					while ($row = mysql_fetch_assoc($result))
					{ echo "<a href=\"index.php?tab={$row['tab']}\">{$row['tab']}</a>";}
                    ?>
                    <li class="search" style="padding-left:40px;width:140px;margin-top:0px;float:right;">
                        <form action="index.php" method="post">
                            <input class="srch_win_text" style="border-radius:3px;background:#64cbf9;border:0;border:1px solid #fff" type="type" name="search" value="">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="sla">
            <div class="wrap">	<span id="w_line">
						GDG SSU <span class="line">&gt;</span> 웹 서비스 만들기 &gt; <?=$tab?></span>
            </div>
        </div>
        <div style="background-color: #f6f6f6; height:1000px">
        	<div id="contentwrap" style="text-align:center">


                    	


    		</div>
    	</div>
        	<div></div>
    </body>

</html>