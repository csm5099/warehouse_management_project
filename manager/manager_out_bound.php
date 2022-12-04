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
  <a href="manager_logout.php">로그아웃</a>
  <a href=""></a>
</nav>
<main>
  <h1>관리자</h1>
  <h2>상품조회</h2>  <!-- 상품 조회하는 칸-->
  <form name="form" method="post" action="./manager_out_bound_search.php">  
  &nbsp;&nbsp;
      <select name="modify">
        <option value="title">일련번호</option>
       
      </select>
  <!-- 일련번호 입력-->
  <input type="sumbit" name="product_no_pk" size="40" > <button>조회</button> 
 
</form>
<!--type확인-->

  <!--<button>조회</button> -->

  <?php
  $database="wearhouse";
  $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");

  mysql_select_db($database, $connect);


  //전체 데이터 가져오기
  $query= "select * from delivery_tb, product_tb  where delivery_tb.product_no_pk  = product_tb.product_NO_PK;";
  $result = mysql_query($query, $connect);

  print "<center><font color=black size=5><b>입고현황</b></font></center>";
  print "<table border=1 align=center>";
  
  print "<tr><td> 인덱스</td><td> 송장번호</td><td> 일련번호</td>
  <td> 배송일자</td><td> 도착일자</td><td> 배송수량</td>
  <td> 사업자</td><td> 일련번호</td><td>상품명</td><td>판매량
  </td><td>가격</td><td>재고량</td></tr>";

  $num=mysql_num_rows($result);
 
  
  for($i=0; $i<$num; $i++) {
    $ans=mysql_fetch_row($result);
  
    print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
    print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
    print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$ans[8]."</td>
    <td>".$ans[9]."</td><td>".$ans[10]."</td><td>".$ans[11]."</td></tr><br>";
    }
  
    print "</table>";

mysql_close($connect);

?>
<INPUT type="hidden"  id="delevery_adt" name="delevery_adt" value="<?php echo $delevery_adt?>" />
<!--도착날짜manager_out_bound_search.php로 전송-->
</main>
<footer>footer</footer>
</body>
</html>






