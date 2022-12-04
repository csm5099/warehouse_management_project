<HTML>
<?php
$modify = $_POST['outsrc_no'];

$database = "warehouse";

$connect=mysql_connect('localhost', 'lcw', 'chaewon')  or die("mySQL ���� ���� Error!");

mysql_select_db($database, $connect);

$query = "SELECT * FROM outsrc WHERE outsrc_no='$modify'";

$result= mysql_query($query, $connect);

 	print "<center><font color=blue size=5><b>��ȸ�� ȭ��  </b></font></center>";
 	print "<table border=1 align=center>";
 	print "<tr><td>��ü��</td><td>��ȭ��ȣ</td><td>����ڹ�ȣ</td><td>��й�ȣ</td></tr><br>";
    



?>

<div style="position:absolute; right:550px; top: 200x;">
  <form name="form" method="post" action="./manager_modify_input.php">
    <input type="submit" name="outsrc_no" value="����">
  </form>

</div>


<?php
    $num= mysql_num_rows($result);

   	 $ans= mysql_fetch_row($result);
   	 print "<tr><td>".$ans[2]."</td><td>".$ans[1]."</td><td>".$ans[0];
     print "<td>".$ans[3]."</td></tr>";



 	print "</table><br>";

 	mysql_close($connect);
    ?>





</HTML>