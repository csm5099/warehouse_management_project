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
    <h2>출고</h2>
    <h3>재고를 추가할 상품을 입력하세요.</h3>
    <form action="./user_out_bound2.php" method="post">
      상품 일련 번호 :
      <input type="text" name="product_no"><br>
      추가할 재고량 :
      <input type="text" name="inbound_amt"><br><br>
      <input type="submit" value="상품 재고 추가하기"><br>
    </form>
    <br>
    <hr>
    <?php
      $database = "warehouse";
      $connect = mysql_connect('localhost','root','root')
                          or die("mySQL 서버 연결 Error!");
      mysql_select_db($database, $connect);
      $query = "select * from product_tb";
      $result = mysql_query ($query, $connect) or die(mysql_error());
      
      print "<center><h1>자신의 등록된 상품 목록 입니다.</h1></center>";
      print "<table border=1 align=center>";
      print
      "<tr>
      <td>사업자 번호</td>
      <td> 일련번호 </td>
      <td> 상품명 </td>
      <td> 판매 금액 </td>
      <td> 재고량 </td>
      </tr>";

      $num = mysql_num_rows($result);
      for($i=0; $i<$num; $i++){
          $ans = mysql_fetch_row($result);
          print
          "<tr>
          <td>".$ans[0]."</td>
          <td>".$ans[1]."</td>
          <td>".$ans[2]."</td>
          <td>".$ans[4]."</td>
          <td>".$ans[5]."</td>
          </tr>";
      }
      print "</table><br>";
      mysql_close($connect)
    ?>
  </main>
  <footer>

  </footer>
</body>

</html>