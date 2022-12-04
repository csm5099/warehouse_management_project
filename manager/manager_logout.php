<?
if(isset($_COOKIE["isOK"])) {
 SetCookie("isOK", $userid, time()-30, "/");
 $msg="<font color=blue sixe=5>Goodbye!!! (�α׾ƿ��Ǿ����ϴ�!!!)</font><br> "; 
}
else {
 $msg="<font color=blue sixe=5>�α׾ƿ� ������ �����ϴ�!!! (Goodbye!!!)</font><br>"; 
}
?>
<HTML>
<HEAD><TITLE>�α׾ƿ�</TITLE></HEAD>
<BODY link='white' vlink='white' alink='orange'>
<center>
<?=$msg?>
<font color=blue size=3>�ʿ��ϸ� �ٽ� �α��� �Ͻʽÿ�.</font><hr>
</center><br>
<table align='center'>
<tr>
<td align=center bgcolor='#000099'><font color=white>
 <a href='../index.html'>���� ȭ������ ����</a></font></td>
</tr>
</table>
</BODY>
