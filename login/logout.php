<?php

if(isset($_COOKIE["isOK"])) {
 SetCookie("isOK", $userid, time()-30, "/");
 $msg="<font color=black sixe=5>Goodbye!!! (로그아웃되었습니다)</font><br> "; 
}
else {
 $msg="<font color=black sixe=5>로그아웃 권한이 없습니다 (Goodbye!!!)</font><br>"; 
}
?>

<HTML>
<HEAD><TITLE>로그아웃</TITLE></HEAD>
<BODY link='white' vlink='white' alink='black'>
<center>
<?=$msg?>
<font color=black size=3>필요하면 다시 로그인 하십시요.</font><hr>
</center><br>
<table align='center'>
<tr>
<td align=center bgcolor='#000099'><font color=white>
 <a href='../index.html'>메인 화면으로 가기</a></font></td>
</tr>
</table>
</BODY>

</HTML>
