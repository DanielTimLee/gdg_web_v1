<?php global $uid, $usrname;
 ?>
<!--초기화면을 불러온다 -->
<?php if(empty($tab)&empty($act)&empty($_GET['sid'])&empty($_GET['mid'])){ ?>
        		   <div style="float:left;text-align:center;">     			
        	
        	<!--최신 글 리스트를 불러온다 -->
<div style="width:650px;margin: 0 10px">	

<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>제목</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>글쓴이</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>날짜</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>조회수</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art ORDER BY no desc Limit 10;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="usrname">
				<?php
$sid = mysql_num_rows(mysql_query("select id from mem where usrname='{$row['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$row['usrname']?></a>
			</td>
			<td class="created">
				<?=$row['Year(CREATED)']?>/<?=$row['Month(CREATED)']?>/<?=$row['DAYOFMONTH(CREATED)']?>
			</td>
			<td class="hit">
				<?=$row['hit']?>
			</td>
		</tr>
	</li>
<?php } ?>
</table>
</div>
			

<div style="width:650px;margin: 0 10px">
<h1>최신 덧글 목록</h1>
<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>댓글</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>글쓴이</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>날짜</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>추천수</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql2 = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com ORDER BY id desc Limit 10;";
	$result2 = mysql_query($sql2);
	while ($row2 = mysql_fetch_assoc($result2)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="comment">
				<a href="index.php?tab=<?=$row2['tab']?>&no=<?=$row2['no']?>&uid=<?=$uid?>"><?=$row2['comment']?></a>
			</td>
			<td class="tab">
				<?=$row2['tab']?>
			</td>
			<td class="usrname">
				<?php
$sid = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$row2['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$row2['usrname']?></a>
			</td>
			<td class="created">
				<?=$row2['Year(CREATED)']?>/<?=$row2['Month(CREATED)']?>/<?=$row2['DAYOFMONTH(CREATED)']?>
			</td>
			<td class="hit">
				<?=$row2['hit']?>
			</td>
		</tr>
	</li>
<?php } ?>
</table>
        	</div>
    </div>    <?php	}
   ?>

<!--리스트를 불러온다 -->
<?php if(!empty($tab)&empty($no)&empty($_POST['act'])){
	?>
<div class="content1" style="float:left">	
<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>제목</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>글쓴이</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>날짜</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>조회수</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art Where tab='$tab' ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="title">
				<a href="index.php?tab=<?=$tab?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="usrname">
				<?php
$sid = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$row['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$row['usrname']?></a>
			</td>
			<td class="created">
				<?=$row['Year(CREATED)']?>/<?=$row['Month(CREATED)']?>/<?=$row['DAYOFMONTH(CREATED)']?>
			</td>
			<td class="hit">
				<?=$row['hit']?>
			</td>
		</tr>
	</li>
<?php }
?>
</table>
<?php if(!empty($uid)){ ?>
	<FORM action="index.php?tab=<?=$tab ?>&uid=<?=$uid?>" METHOD="post" style="float:right">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="add">
	<button onclick="javascript_: location.href='index.php?tab=<?=$tab ?>&uid=<?=$uid?>';">
		글 쓰기
	</button>
</form><?php } ?>

</div>
<?php
} ?>
<!--게시글을 보여준다-->
<?php 
	if(!empty($data)&empty($_POST['act'])){
	$hit=mysql_query("UPDATE art SET hit = hit + 1 WHERE no=$no");
?>
<div class="content1" style="float:left;background-color: #ffffff">
<div id="list" style="padding-left:10px;padding-right:10px">
	<div style="display:block; border-bottom:1px solid #ccc"><input style="float:right" type="button" value="뒤로가기" onclick="history.back(-1);">
	<h1 style="font-size:21px"><?=$data['title'] ?></h1>
	
	<p style="font-size:14px;line-height:0.6em"><?=$data['created']?></p>
	<p style="font-size:14px">
		<?php
$sid = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$data['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$data['usrname']?></a>
	<span style="font-size:12px;float:right">조회수 : <?=$data['hit'] ?></span></p>
	
	</div>
	<div class="description" style="border-bottom:2px solid #ccc">
		<div style="font-size:12px"><?=$data['description'] ?></div>
	</div>
	<br>
		<button style="float:left" onclick="javascript_: location.href='index.php?tab=<?=$tab ?>&uid=<?=$uid?>';">목록</button>
	<?php if ($data['usrname']==$usrname){?>
	<form action="index.php?tab=<?=$tab ?>&no=<?=$no ?>&uid=<?=$uid?>" METHOD="post" style="float:right">
		<INPUT TYPE="HIDDEN" NAME="act" VALUE="mod">
		<button onclick="javascript_: location.href='index.php?tab=<?=$tab ?>&no=<?=$no ?>&uid=<?=$uid?>';">수정하기</button>
	</form>
<!--글을 삭제한다 -->
	<form action="process.php?uid=<?=$uid?>" method="post" style="float:right">
		<input type="hidden" name="mode" value="del" />
		<input type="hidden" name="tab" value="<?=$tab ?>" />
		<input type="hidden" name="no" value="<?=$no ?>" />
		<button onclick="javascript_: location.href='process.php?uid=<?=$uid?>';">
			삭제하기
		</button>
	</form>
	<?php } ?>
</div>
</div>
<!--댓글을 쓰고 작성한다-->
<div class="content2" style="float:right;padding-left:20px">
	<form action="process.php?uid=<?=$uid?>" method="post" name='f3' style="width:230px">
		<input type="hidden" name="tab" value=<?=$tab ?> />
		<input type="hidden" name="mode" value="com" />
		<input type="hidden" name="no" value="<?=$no ?>" />
		<input type="hidden" name="artname" value="<?=$data['usrname']?>" />
		
		<div class="comment">
		<h1><label>댓글쓰기<label></h1>
			<textarea name="comment"></textarea>
		
		<a style="float:right;border: 1px solid #ccc; margin:10 10;font-size:13px" href="process.php?uid=<?=$uid?>" onClick="document.f3.submit();return false">댓글 쓰기</a>
	</div>
	</form>
	<div>
<!--댓글을 보여준다 + 삭제한다-->

<?php if (empty($comment)){
	$sql = "select * from com WHERE no='$no'ORDER BY id desc";
	$result = mysql_query($sql);
	while ($com = mysql_fetch_assoc($result))
	{ ?>
		<div style="width: 220px">
<h2><?=$com['comment'] ?></h2>
<p>
	<?php
$sid = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$com['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$com['usrname']?></a>--<sPan style="font-size:5px"><?=$com['created'] ?></span></p>
	
		<?php if ($com['usrname']==$usrname){?>
		<form action="index.php?tab=<?=$tab?>&no=<?=$no?>&uid=<?=$uid?>" method="post" name='fz' style="float:left">
			<input type="hidden" name="comment" value="<?=$com['comment'] ?>" />
			<input type="hidden" name="id" value="<?=$com['id'] ?>" />
				<a style="border: 1px solid #ccc; margin:0 10px;font-size:8px" href="index.php?tab=<?=$tab?>&no=<?=$no?>&uid=<?=$uid?>" onClick="document.fz.submit();return false">수정하기</a>
		</form>
		<form action="process.php?uid=<?=$uid?>" method="post" name='f2' style="float:left">
			<input type="hidden" name="mode" value="c_del" />
			<input type="hidden" name="tab" value=<?=$tab ?> />
			<input type="hidden" name="no" value="<?=$no ?>" />
			<input type="hidden" name="id" value="<?=$com['id'] ?>" />
			<a style="border: 1px solid #ccc; margin:0 10px;font-size:8px" href="process.php?uid=<?=$uid?>" onClick="document.f2.submit();return false">삭제하기</a>
		</form>
		<?php } ?>
</div><br>

<?php } } ?>
</div></div>
<!--댓글을 수정한다-->
<?php 
if(!empty($comment)){ 
?>                
	<form action="process.php?uid=<?=$uid?>" method="post">
		<input type="hidden" name="tab" value=<?=$tab?> />
		<input type="hidden" name="mode" value="c_mod" />
		<input type="hidden" name="no" value="<?=$no?>" />
		<input type="hidden" name="id" value="<?=$id?>" />
		<div class="comment"><label>댓글수정<label>
			<textarea name="comment"><?=$comment?></textarea></div>
		<button onclick="javascript_: location.href='process.php?uid=<?=$uid?>';">댓글 수정하기</button>
	</form>
<?php	}       ?>            
<?php	}       ?>
<!--글을 추가한다 -->
<?php if ($act == "add"){
	?>
	<div style="width:650px;float:left;padding-left:10px">
	<form action="process.php?uid=<?=$uid?>" method="post">
		<input type="hidden" name="tab" value=<?=$tab?> />
		<input type="hidden" name="mode" value="add" />
			<table style="border-bottom:1px solid #ccc;background-color:#fff;">
				<tbody>
					<tr>
						<th scope"row" style="border-right:2px solid #ccc;padding-right:5px"><br>카테고리 선택<br><br></th>
							<td style="padding-left:20px"><br><?php
	$sql = "select tab from cat";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
		echo "<label><input type=\"radio\" name=\"tab\" value={$row['tab']}>{$row['tab']}</label>";
}
?><br><br></td>
					</tr>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">제목<br><br></th>
							<td style="padding-left:5px">
								<input type="text" name="title" style="min-width: 500px" value="&nbsp;&nbsp;"/><br><br>
							</td>
					</tr>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">본문</th>
							<td style="padding-left:5px">
								<textarea name="description" style="min-width:500px;min-height:600px"></textarea>
							</td>
					</tr>
				</tbody>
			</table>
		<input type="submit" />
	</form>
	</div>
<?php } ?>
<!--글을 수정한다 -->
<?php 
if ($act == "mod"){
?>                
	<form action="process.php?uid=<?=$uid?>" method="post">
		<input type="hidden" name="tab" value=<?=$tab ?> />
		<input type="hidden" name="mode" value="mod" />
		<input type="hidden" name="no" value="<?=$no ?>" />
			<table style="border-bottom:1px solid #ccc;background-color:#fff;">
				<tbody>
					<tr>
						<th scope"row" style="border-right:2px solid #ccc;padding-right:20px"><br>카테고리 선택<br><br></th>
							<td style="padding-left:20px"><br><?php
	$sql = "select tab from cat";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
		echo "<label><input type=\"radio\" name=\"tab\" value={$row['tab']}>{$row['tab']}</label>";
}
?><br><br></td>
					</tr>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">제목<br><br></th>
							<td style="padding-left:20px">
								<input type="text" name="title" style="min-width: 600px" value="<?=$data['title'];?>"/><br><br>
							</td>
					</tr>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">본문</th>
							<td style="padding-left:20px">
								<textarea name="description" style="min-width:600px;min-height:600px"><?=$data['description'];?></textarea>
							</td>
					</tr>
				</tbody>
			</table>
    	<input type="submit"/>
	</form>
<?php	}
                ?>

<!--로그인한다 -->
<?php if ($act == "log"){
	?>
	<div style="width:400px;float:left;padding:80px 100px;">
	<form action="process.php?uid=<?=$uid?>" method="post">
        <input type="hidden" name="mode" value="log" />
            <table style="background-color:#fff;">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">아이디</th>
                            <td style="padding-left:20px">
                                <input type="text" name="usrname" style="min-width: 300px"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">PW</th>
                            <td style="padding-left:20px">
                                <input type="password" name="pw" style="min-width: 300px"/>
                            </td>
                    </tr>
                </tbody>
            </table>
        <input type="submit" style="float:left"/>
    </form>
    <FORM action="index.php?uid=<?=$uid?>" METHOD="post" NAME="mem" style="float:right">
                    	<INPUT TYPE="HIDDEN" NAME="act" VALUE="mem">
                    	<a href="index.php?uid=<?=$uid?>" onClick="document.mem.submit();return false">회원가입</a>
                    	</FORM>
                    	</div>
<?php } ?>

<!--회원 가입한다 -->
<?php if ($act == "mem"){
	?>
	<form action="process.php?uid=<?=$uid?>" method="post">
        <input type="hidden" name="mode" value="mem" />
            <table style="background-color:#fff;">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">아이디</th>
                            <td style="padding-left:20px">
                                <input type="text" name="usrname" style="min-width: 300px"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">PW</th>
                            <td style="padding-left:20px">
                                <input type="password" name="pw" style="min-width: 300px"/>
                            </td>
                    </tr>
                    <tr>
                       <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이름</th>
                            <td style="padding-left:20px">
                                <input type="text" name="name" style="min-width: 300px"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이메일</th>
                            <td style="padding-left:20px">
                                <input type="email" name="email" style="min-width: 300px"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">자기소개</th>
                            <td style="padding-left:20px">
                                <input type="text" name="memo" style="min-width: 300px;min-height:300px"/>
                            </td>
                    </tr>
                </tbody>
            </table>
        <input type="submit" />
    </form>
<?php } ?>



<!--회원 가입한다 -->
<?php if ($act == "m_mem"){
	?>
	<form action="process.php?uid=<?=$uid?>" method="post">
        <input type="hidden" name="mode" value="m_mem" />
            <table style="background-color:#fff;float:left">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">아이디</th>
                            <td style="padding-left:20px">
                                <input type="text" name="usrname" style="min-width: 300px" value="<?=$u_data['usrname']?>"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">PW</th>
                            <td style="padding-left:20px">
                                <input type="password" name="pw" style="min-width: 300px" value="<?=$u_data['pw']?>"/>
                            </td>
                    </tr>
                    <tr>
                       <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이름</th>
                            <td style="padding-left:20px">
                                <input type="text" name="name" style="min-width: 300px" value="<?=$u_data['name']?>"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이메일</th>
                            <td style="padding-left:20px">
                                <input type="email" name="email" style="min-width: 300px" value="<?=$u_data['email']?>"/>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">자기소개</th>
                            <td style="padding-left:20px">
                                <input type="text" name="memo" style="min-width: 300px;min-height:300px" value="<?=$u_data['memo']?>"/>
                            </td>
                    </tr>
                    <tr>
                    	<td>
                    		<input type="submit" />
                    	</td>
                    </tr>
                </tbody>
            </table>
        
    </form>
<?php } ?>


 
<!--메세지 목록을 불러온다 -->
<?php if ($act==l_msg) {?>

<div style="width:650px;margin: 0 10px;float:left">	

<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>보낸 사람</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>제목</span>
			</th>
<!--			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>내용</span> -->
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>날짜</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>확인</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from msg WHERE receiver='$uid' ORDER BY mid desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="title">
				
				<?php              
$sen = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$row['sender']}';"))?>

				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>&sid=<?=$row['sender']?>"><?=$sen['usrname']?></a>
			</td>
			<td class="tab">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>&mid=<?=$row['mid']?>"><?=$row['title']?></a>
			</td>
<!--			<td class="usrname">
				<?=$row['contents']?>-->
			</td>
			<td class="created">
				<?=$row['Year(CREATED)']?>/<?=$row['Month(CREATED)']?>/<?=$row['DAYOFMONTH(CREATED)']?>
			</td>
			<td class="hit">
				<?=$row['chk']?>
			</td>
		</tr>
	</li>
<?php } ?>
</table>
</div>

<?php } ?>




<!--메세지를 불러온다 -->
<?php if (!empty($_GET['mid'])) {
	$chk1=mysql_query("UPDATE msg set chk='0' WHERE receiver='$uid' and mid='{$_GET['mid']}'"); 
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from msg WHERE receiver='$uid' and mid='{$_GET['mid']}';";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	?>

	<div style="width:650px;float:left;padding-left:10px">
            <table style="background-color:#fff;">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">보낸 사람</th>
                            <td style="padding-left:20px">
                            	<?php              
$sen = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$row['sender']}';"))?>
<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>&sid=<?=$row['sender']?>"><?=$sen['usrname']?></a>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">받은 사람</th>
                            <td style="padding-left:20px">
<?php              
$rec = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$_GET['uid']}';"))?>
<?=$rec['usrname']?>
					
                            </td>
                    </tr>
                    <tr>
                       <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">제목</th>
                            <td style="padding-left:20px">
                                <?=$row['title']?></td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">내용</th>
                            <td style="padding-left:20px">
                                <?=$row['contents']?>
                            </td>
                    </tr>
                    <tr>
                    	<td colspan="2"> <FORM action="index.php?uid=<?=$uid?>&sid=<?=$row['sender']?>" METHOD="post" style="float:right">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="msg">
	<input style="float:right" type="submit" value="쪽지 쓰기">
	</form></td>
                    </tr>
                </tbody>
            </table>
    </form>
	</div>

<?php }?>



<!--활동내역 업데이트 목록을 불러온다 -->
<?php if ($act==s_rec) {?>

<div style="width:650px;margin: 0 10px;float:left">	

<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>덧글 단 사람</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>글 제목</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span> 
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>날짜</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>확인</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com WHERE artname='$usrname' ORDER BY id desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="title">
				
				<?php              
$sen = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$row['usrname']}';"))?>

				<a href="index.php?uid=<?=$uid?>&sid=<?=$sen['uid']?>"><?=$row['usrname']?></a>
			</td>
			<td class="title">
				
				<?php              
$tit = mysql_fetch_assoc(mysql_query("select title from art where no='{$row['no']}';"))?>
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$tit['title']?></a>
			</td>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="created">
				<?=$row['Year(CREATED)']?>/<?=$row['Month(CREATED)']?>/<?=$row['DAYOFMONTH(CREATED)']?>
			</td>
			<td class="hit">
				<?=$row['chk']?>
			</td>
		</tr>
		<?php $chk1=mysql_query("UPDATE com set chk='0' WHERE artname='$usrname' and chk='1'"); ?>
	</li>
<?php } ?>
</table>
</div>

<?php } ?>
