<?php if(!empty($uid)){
$count1=mysql_num_rows(mysql_query("Select * from art Where usrname='$usrname'"));
$count2=mysql_num_rows(mysql_query("Select * from com Where usrname='$usrname'"));
$sum=$count1*50 + $count2*30 + $u_data['attend']*30;

$t="나의 정보";
} 
else{
$t="로그인을 먼저 해주세요";
}?>
<table width="100%" style="text-align:center;width:230px;border-bottom:1px solid #ccc;background-color:#fff;">
    <thead>
        <tr>
            <th colspan='2' scope="col" style="font-size:20px;border-bottom:2px solid #ccc">	<span><?=$t?></span>

            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2"><a href="index.php?uid=<?=$uid?>&sid=<?=$u_data['uid']?>"><?=$u_data['usrname']?> </a>님
                </td>
        </tr>
        <tr>
        	<td>이름</td>
            <td>
 <?=$u_data['name']?>
                </td>
        </tr>
        <tr>
        	<td>등급</td>
            <td>
 <b>
 	<?php if(!empty($uid)){?> 
<?php	if($sum<501){ $sum="초수"; }
elseif($sum<1001){ $sum="중수"; }
elseif($sum<3000){ $sum="고수"; } 
elseif($sum<90000){ $sum="폐인"; } 
?>
<?=$sum?>
<?php } ?>
 </b>
                </td>
        </tr>
        <tr>
        	<td style="border-bottom:1px solid #ccc">가입일</td>
            <td style="border-bottom:1px solid #ccc">
            	<?=$u_data['Year(CREATED)']?>/<?=$u_data['Month(CREATED)']?>/<?=$u_data['DAYOFMONTH(CREATED)']?>
                </td>
        </tr>
        <tr>
            <td>출석수
                </td>
                <td><?=$u_data['attend']?> 번</td>
        </tr>
        <tr>
            <td>게시글 작성수
                </td>
                <td><?=$count1?> 개</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #ccc">덧글 작성수
                </td>
                <td style="border-bottom:1px solid #ccc"><?=$count2?> 개</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #ccc">
            	<FORM action="index.php?uid=<?=$uid?>" METHOD="POST" NAME="act">
                    	<INPUT TYPE="HIDDEN" NAME="act" VALUE="s_art">
                    	<a href="index.php?uid=<?=$uid?>" onClick="document.act.submit();return false">내가 쓴 글</a>
                    	</FORM>
                    	</td>
            <td style="border-bottom:1px solid #ccc">
            	<FORM action="index.php?uid=<?=$uid?>" METHOD="POST" NAME="act2">
                    	<INPUT TYPE="HIDDEN" NAME="act" VALUE="s_com">
                    	<a href="index.php?uid=<?=$uid?>" onClick="document.act2.submit();return false">내가 쓴 덧글</a>
                    	</FORM>
                </td>
        </tr>
        <?php if(!empty($uid)){?>
        <tr>
            <td colspan="2">
            	 
<?php	$sql = "Select * from msg Where receiver='$uid' and chk='1'";
$result=mysql_query($sql) or die(mysql_error());
$count=mysql_num_rows($result);?>

                    	<FORM action="index.php?uid=<?=$uid?>" METHOD="post">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="l_msg">
	<input type="submit" value="새로운 쪽지가 <?=$count?>통 도착했습니다.">
	</form>
                    
                </td>
        </tr>
        <tr>
            <td colspan="2">
            	<?php	$sql = "Select * from com Where artname='$usrname' and chk='1'";
$result=mysql_query($sql) or die(mysql_error());
$count0=mysql_num_rows($result);?>
                    	<FORM action="index.php?uid=<?=$uid?>" METHOD="post">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="s_rec">
	<input type="submit" value="내글에 새 덧글이 <?=$count0?>개 달렸습니다.">
	</form>
            </td>
        </tr>
        	<?php } ?>
        <tr>
            <td colspan="2">
            	<?php if(!empty($uid)){ ?>
	<FORM action="index.php?tab=<?=$tab ?>&uid=<?=$uid?>" NAME="f1" METHOD="post" style="text-align:center">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="add">
                    	<b><a href="index.php?tab=<?=$tab ?>&uid=<?=$uid?>" onClick="document.f1.submit();return false">새 글 작성하러 가기</a></b>
                    	</FORM>
                    	<?php } ?>
                </td>
        </tr>

        <tr>
        	<td colspan="2">
        		<?php if(empty($uid)){?>
                    	<FORM action="index.php" METHOD="post" NAME="log" style="text-align:center">
                    	<INPUT TYPE="HIDDEN" NAME="act" VALUE="log">
                    		<button style="width="23px" onclick="javascript_: location.href='index.php';">
		로그인
	</button>
                    	</FORM>
                    	<?php }
else {?> <span style="float:left"><button style="width="23px" onclick="alert('로그아웃 되셨습니다.');javascript_: location.href='index.php';">
		로그아웃
	</button></span> 
	<FORM action="index.php?uid=<?=$uid?>" METHOD="post" NAME="log" style="text-align:center">
                    	<INPUT TYPE="HIDDEN" NAME="act" VALUE="m_mem">
                    		<button style="float:right" onclick="javascript_: location.href='index.php?uid=<?=$uid?>';">
		정보 수정
	</button>
	</form>
	<?php if($uid==1){?>
<a style="float:right" href="admin.php?uid=<?=$uid?>"><input type="submit" value="관리자 페이지"></a> <?php }?>
<?php }?>
        	</td>
        </tr>
    </tbody>
</table>

