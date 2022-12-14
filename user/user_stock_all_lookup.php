<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <title>user</title>
</head>

<body>
  <header>
    <a href="./user.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <nav>
    <a href="user_stock.html">재고</a>
    <a href="user_out_bound.html">출고</a>
    <a href="user_order.html">주문</a>
    <a href="user_info.html">회원 정보 수정</a>
    <a href="./user_logout.php">로그아웃</a>
  </nav>
  <main>
    <?php
	    include '../Check_Cookie.php';
    ?>
    <h1>외주업체</h1>
    <h2>재고</h2>

    <?php
      $outsrc_no = $_COOKIE["user"];
      
      $database = "warehouse";
      $connect = mysql_connect('localhost','root','root')
                          or die("mySQL 서버 연결 Error!");
      mysql_select_db($database, $connect);
      $query = "select * from product_tb where outsrc_no = $outsrc_no";
      $result = mysql_query ($query, $connect) or die(mysql_error());
      
      print "<center><font color=red size=5><b>상품 조회 결과 입니다.</b></font></center>";
      print "<table border=1 align=center>";
      print "<tr><td>사업자 번호</td><td> 일련번호 </td><td> 상품명 </td><td> 판매 금액 </td><td> 재고량 </td></tr><br>";

      $num = mysql_num_rows($result);
      for($i=0; $i<$num; $i++){
          $ans = mysql_fetch_row($result);
          print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2]."</td>";
          print "<td>".$ans[4]."</td><td>".$ans[5]."</td></tr>";
      }
      print "</table><br>";
      mysql_close($connect)
    ?>

  </main>
  <footer>

  </footer>
</body>

</html>