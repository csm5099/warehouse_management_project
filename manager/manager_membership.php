<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css"></head>
  <body>
  <header>
  <a href="../login/login.html"> header</a>
  </header>
  <nav>
  <a href="manager_stock.html">재고</a>
  <a href="manager_out_bound.php">출고</a>
  <a href="manager_in_bound.php">입고</a>
  <a href="manager_membership.php">회원관리</a>
  <a href="manager_logout.php">로그아웃</a>
  <a href=""></a>
  </nav>
  <main>
  <?php
	include '../Check_Cookie_manager.php';
?>
  <h1> &nbsp;관리자</h1>
  <h2> &nbsp;&nbsp;회원관리</h2>
  
  <!-- 사업자번호로 외주업체 조회-->
  <form name="form" method="post" action="./manager_membership_search.php">  
  &nbsp;&nbsp;

  <select name="search">
  <option value="title">사업자번호</option>
  </select>
  <input type="sumbit" name="outsrc_no" size="40"> <button>조회</button> 
  </form>

  <!-- 사업자번호로 외주업체 삭제-->
  <form name="form" method="post" action="./manager_membership_delete.php">  
  &nbsp;&nbsp;
  <select name="delete">
  <option value="title">사업자번호</option>
  </select>
  <input type="sumbit" name="outsrc_no" size="40"> <button>삭제</button> 
  </form>


<?php

$database="warehouse";
$connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");
mysql_select_db($database, $connect);
$query= "SELECT * FROM outsrc_tb";
$result = mysql_query($query, $connect);



print "<center><font color=black size=5><b>조회 결과 </b></font></center>";
print "<table border=1 align=center>";
print "<tr><td>사업자번호</td><td>전화번호 </td><td>업체명</td><td>비밀번호</td></tr>";


$num=mysql_num_rows($result);
for($i=0; $i<$num; $i++) {
    $ans= mysql_fetch_row($result);
    print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
    print "</td><td>".$ans[3]."</td></tr><br>";
}
print "</table>";

mysql_close($connect);

?>

</main>
<footer>footer</footer>
</body>
</html>





