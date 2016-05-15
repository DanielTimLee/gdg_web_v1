<?php $sql = "SELECT *, Year(CREATED), Month(CREATED), DAYOFMONTH(CREATED) From mem where id =". $_GET['sid'];
	$result = mysql_query($sql);
	$s_data = mysql_fetch_assoc($result);
 ?>

<?php if (empty($act)) {?>
	
        <table style="background-color:#fff;float:left">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">아이디</th>
                            <td style="padding-left:20px">
                                <?=$s_data['usrname']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">PW</th>
                            <td style="padding-left:20px">
                                
                            </td>
                    </tr>
                    <tr>
                       <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이름</th>
                            <td style="padding-left:20px">
                                <?=$s_data['name']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">이메일</th>
                            <td style="padding-left:20px">
                                <?=$s_data['email']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">자기소개</th>
                            <td style="padding-left:20px">
                                <?=$s_data['memo']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">출석 수</th>
                            <td style="padding-left:20px">
                                <?=$s_data['attend']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">회원가입</th>
                            <td style="padding-left:20px">
                                <?=$s_data['created']?>
                            </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
	<FORM action="index.php?uid=<?=$uid?>&sid=<?=$_GET['sid']?>" METHOD="post" style="float:left">
	<INPUT TYPE="HIDDEN" NAME="act" VALUE="msg">
	<input style="float:left" type="submit" value="쪽지 쓰기">
	</form>
                    		
                    		<input style="float:right" type="button" value="뒤로가기" onclick="history.back(-1);">
                    	</td>
                    </tr>
                </tbody>
                
            </table>
<?php }?>

<?php if ($act==msg) {?>

	<div style="width:650px;float:left;padding-left:10px">
	<form action="process.php?uid=<?=$uid?>" method="post">
        <input type="hidden" name="mode" value="msg" />
            <table style="background-color:#fff;">
                <tbody>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">보내는 사람</th>
                            <td style="padding-left:20px">
                                <input type="hidden" name="sender" value="<?=$uid?>" />
                                <?=$u_data['usrname']?>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">받는 사람</th>
                            <td style="padding-left:20px">
                                <input type="hidden" name="receiver" value="<?=$_GET['sid']?>" />
<?php              
$rec = mysql_fetch_assoc(mysql_query("select usrname from mem where id='{$_GET['sid']}';"))?>
<?=$rec['usrname']?>
					
                            </td>
                    </tr>
                    <tr>
                       <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">제목</th>
                            <td style="padding-left:20px">
                                <input type="text" name="title" style="min-width: 500px" value="&nbsp;&nbsp;"/>                           </td>
                    </tr>
                    <tr>
                        <th scope="row" style="border-right:2px solid #ccc;padding-right:20px">내용</th>
                            <td style="padding-left:20px">
                                <textarea name="contents" style="min-width:500px;min-height:600px"><pre></pre></textarea>
                            </td>
                    </tr>
                </tbody>
            </table>
        <input type="submit" />
    </form>
	</div>

<?php }?>
