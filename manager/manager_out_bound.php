<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css">
  <title>manager</title>
</head>
<body>
<header>
  <a href="../login/login.html"> header</a>
</header>
<nav>
  <a href="manager_stock.html">재고</a>
  <a href="manager_out_bound.php">출고</a>
  <a href="manager_in_bound.php">입고</a>
  <a href="manager_membership.php">회원관리</a>
  <a href=""></a>
</nav>
<main>
  <h1>관리자</h1>
  <h2>상품조회</h2>  <!-- 상품 조회하는 칸-->
  <form name="form" method="post" action="./manager_out_bound_search.php">  
  <input type="text" size="40" name="product_no_pk" placeholder="일련번호를 입력하세요" >  
  <button>조회</button> 

<?php
  $product_no = $_POST['product_no'];
 
  $database="warehouse";
  $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");

  mysql_select_db($database, $connect);
  //전체 데이터 가져오기
  $query= "SELECT * FROM product_tb";
  
  $result = mysql_query($query, $connect);

  print "<center><font color=black size=5><b>입고현황</b></font></center>";
  print "<table border=1 align=center>";
  
  print "<tr><td> 일련번호</td><td>평점</td><td> 상품명</td><td>수량
  </td><td>가격</td><td>재고량</td><td>상태</td><td>입고일</td></tr>";

  $num=mysql_num_rows($result);
 
  
  for($i=0; $i<$num; $i++) {
    $ans=mysql_fetch_row($result);
  
    print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
    print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
    print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
    }
  
    print "</table>";

mysql_close($connect);

?>

</main>
<footer>footer</footer>
</body>
</html>






