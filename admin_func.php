<!--카테고리 만들기 -->
<?php if ($act == "a_cat"){
	?>
	<h1>카테고리 만들기</h1>
	<h3>만드실 카테고리 이름과 설명을 간단히 적어주십시요</h3>
	<form action="process.php" method="post">
		<input type="hidden" name="mode" value="a_cat"/>
			<table style="border-bottom:1px solid #ccc;background-color:#fff;">
				<tbody>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">카테고리<br><br></th>
							<td style="padding-left:20px">
								<input type="text" name="tab" style="min-width: 300px" value=""/><br><br>
							</td>
					</tr>
					<tr>
						<th scope="row" style="border-right:2px solid #ccc">설명</th>
							<td style="padding-left:20px">
								<textarea name="description" style="min-width:300px;min-height:300px"></textarea>
							</td>
					</tr>
				</tbody>
			</table>
		<input type="submit" />
	</form>
<?php } ?>
<!--게시글을 관리한다-->
<?php if ($act == "a_art"){
	?>
	<h1>게시글 관리하기</h1>
	<h3>게시글을 클릭하면 페이지로 이동됩니다.</h3>
<div class="content1" style="float:left">	
<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>제목</span>
			</th><th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>"><?=$row['title']?></a>
			<td class="tab">
				<?=$row['tab']?></td>
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
<FORM action="index.php?tab=<?=$tab ?>" METHOD="post" style="float:right">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="add">
	<button onclick="javascript_: location.href='admin.php?tab=<?=$tab ?>';">
		글 쓰기
	</button>
</form>
</div>
<?php
} ?>


<!--댓글을 관리한다-->
<?php if ($act == "a_com"){
	?>
	<h1>댓글 관리하기</h1>
	<h3>댓글을 관리하는 페이지 입니다.</h3>
<table width="70%" style="border-bottom:1px solid #ccc;background-color:#fff;">
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com ORDER BY id desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="comment">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['comment']?></a>
			</td>
			<td class="tab">
				<?=$row['tab']?>
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
<?php } ?>
</table>
<?php } ?>



<!--메세지를 관리한다 -->
<?php if ($act==l_msg) {?>

<div style="width:650px;margin: 0 10px;float:left">	

<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>보낸 사람</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>받은 사람</span>
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from msg ORDER BY mid desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="sender">
				
				<?php              
$sen = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$row['sender']}';"))?>

				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>&sid=<?=$row['sender']?>"><?=$sen['usrname']?></a>
			</td>
			<td class="receiver">
				<?php              
$rec = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$row['receiver']}';"))?>
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>&sid=<?=$row['receiver']?>"><?=$rec['usrname']?></a>
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$row['receiver']?>&mid=<?=$row['mid']?>"><?=$row['title']?></a>
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



<!--회원을 관리한다-->
<?php if ($act == "a_mem"){
	?>
	<h1>회원 관리하기</h1>
	<h3>아이디를 클릭하면 설명 페이지로 이동됩니다.</h3>
<div class="content1" style="float:left">	
<table width="100%" style="border-bottom:1px solid #ccc;background-color:#fff;">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>아이디</span>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>비밀번호</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>이름</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>이메일</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>자기소개</span>
			</th>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>가입일</span>
			</th>
	</tr>
</thead>
<tbody>
	<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from mem ORDER BY uid desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="usrname">
				<?php
$sid = mysql_fetch_assoc(mysql_query("select id from mem where usrname='{$row['usrname']}';"))?>
				<a href="index.php?uid=<?=$uid?>&sid=<?=$sid['uid']?>"><?=$row['usrname']?></a>
			</td>
			<td class="pw">
				<?=$row['pw']?>
			</td>
			<td class="name">
				<?=$row['name']?>
			</td>
			<td class="email">
				<?=$row['email']?>
			</td>
			<td class="memo">
				<?=$row['memo']?>
			</td>
			<td class="created">
				<?=$row['Year(CREATED)']?>/<?=$row['Month(CREATED)']?>/<?=$row['DAYOFMONTH(CREATED)']?>
			</td>
		</tr>
	</li>
<?php }
?>
</table>
</div>
<?php
} ?>
