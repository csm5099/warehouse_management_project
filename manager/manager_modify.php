<HTML>
<?php
$modify = $_POST['outsrc_no'];

$database = "warehouse";

$connect=mysql_connect('localhost', 'lcw', 'chaewon')  or die("mySQL 서버 연결 Error!");

mysql_select_db($database, $connect);

$query = "SELECT * FROM outsrc WHERE outsrc_no='$modify'";

$result= mysql_query($query, $connect);

 	print "<center><font color=blue size=5><b>조회된 화면  </b></font></center>";
 	print "<table border=1 align=center>";
 	print "<tr><td>업체명</td><td>전화번호</td><td>사업자번호</td><td>비밀번호</td></tr><br>";
    



?>

<div style="position:absolute; right:550px; top: 200x;">
   <form name="form" method="post"  action="./manager_modify_input.php">  
     <input type="submit" name="outsrc_no" value="삭제">
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
