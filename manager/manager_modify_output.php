<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
</head>
<nav>
  <a href="manager_stock.html">재고</a>
  <a href="manager_out_bound.php">출고</a>
  <a href="manager_in_bound.php">입고</a>
  <a href="manager_membership.php">회원관리</a>
  <a href="manager_logout.php">로그아웃</a>
</nav>
<main>
<?php
	include '../Check_Cookie_manager.php';
?>
  <h1>관리자</h1>
  <h2>회원관리</h2>
  <?php

    $database="warehouse";
    $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);
    $query= "SELECT * FROM outsrc";
    $result = mysql_query($query, $connect);

    print "<center><font color=blue size=5><b>삭제 결과 </b></font></center>";
    print "<table border=1 align=center>";

    print "<tr><td> 업체명</td><td>전화번호 </td><td> 사업자번호</td><td>비밀번호</td></tr>";

    $num=mysql_num_rows($result);
    for($i=0; $i<$num; $i++) {
        $ans= mysql_fetch_row($result);
        print "<tr><td>".$ans[2]."</td><td>".$ans[1]."</td><td>".$ans[0];
        print "</td><td>".$ans[3]."</td></tr><br>";
    }

    print "</table>";

    mysql_close($connect);
    ?>

</main>
<footer>footer</footer>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>