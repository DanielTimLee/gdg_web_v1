<!--게시글을 검색한다-->
<?php if ($act == "s_art"){
	?>
	<h1>내가 쓴 글</h1>
	<h3>게시글을 클릭하면 페이지로 이동됩니다.</h3>

<table width="65%" style="border-bottom:1px solid #ccc;background-color:#fff;float:left">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art Where usrname='$usrname' ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
</tbody>
</table>
<?php
} ?>


<!--댓글을 검색한다-->
<?php if ($act == "s_com"){
	?>
	<div>
	<h1>내가 쓴 덧글입니다.</h1>
	<h3>댓글을 관리하는 페이지 입니다.</h3>
<table width="65%" style="border-bottom:1px solid #ccc;background-color:#fff;float:left">
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com WHERE usrname='$usrname' ORDER BY id desc;";
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
				<?=$row['usrname']?>
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
</table></div>
<?php } ?>

<!--모든 글을 검색한다-->
<?php if ($act == "s_all"){
	?>
	
	<h1>'<?=$_POST['search']?>'에 대해서 찾은 검색 결과 입니다.</h1>
	<h2></h2>
	<h3>관련 글 - 게시글을 클릭하면 페이지로 이동됩니다.</h3>

<table width="65%" style="border-bottom:1px solid #ccc;background-color:#fff;float:left">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art Where description Like '%{$_POST['search']}%' ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art Where title Like '%{$_POST['search']}%' ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from art Where usrname Like '%{$_POST['search']}%' ORDER BY no desc";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			</td>
			<td class="title">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['title']?></a>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
</tbody>
</table>




<div style="width:650px">
	<br>
	<h3>관련 덧글 - 댓글을 클릭하면 페이지로 이동합니다.</h3>
<table width="97%" style="border-bottom:1px solid #ccc;background-color:#fff;float:left">
<thead>
	<tr>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>게시판</span>
			<th scope="col" style="border-bottom:2px solid #ccc">
				<span>댓글</span>
			</th>
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
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com Where comment Like '%{$_POST['search']}%' ORDER BY id desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			<td class="comment">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['comment']?></a>
			</td>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
<?php
	$sql = "select *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) from com Where usrname Like '%{$_POST['search']}%' ORDER BY id desc;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
?>
	<li style="list-style: none; position: relative;">
		<tr>
			<td class="tab">
				<?=$row['tab']?>
			<td class="comment">
				<a href="index.php?tab=<?=$row['tab']?>&no=<?=$row['no']?>&uid=<?=$uid?>"><?=$row['comment']?></a>
			</td>
			</td>
			<td class="usrname">
				<?=$row['usrname']?>
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
</table></div>
<?php } ?>
