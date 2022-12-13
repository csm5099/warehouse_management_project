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
      $no_pk = $_POST["product_no_pk"];
      $database = "warehouse";
      $connect = mysql_connect('localhost','root','root')
                          or die("mySQL 서버 연결 Error!");
      mysql_select_db($database, $connect);
      $query = "select * from product_tb where product_no_pk = '$no_pk'"; //manager_stock.html에서 입력받은 상품명이 포함된 데이터검색
      $result = mysql_query($query,$connect);
      print "$product_dt";
      
      print "<font color=red size=5><b>상품 일련번호 조회 결과 입니다.</b></font>";
      print "<table border=1>";
      print "<tr><td> 일련번호 </td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td><td> 재고량 </td>";
      print "</tr><br>";
      $num = mysql_num_rows($result);
      for($i=0; $i<$num; $i++){
          $ans = mysql_fetch_row($result);
          print "<tr><td>".$ans[1]."</td><td>".$ans[2]."</td><td>".$ans[3];
          print "</td><td>".$ans[4]."</td><td>".$ans[5]."</td> </tr><br>";
}
      mysql_close($connect);
    ?>
     <form action="user_stock_update2.php" method="post">
      <label style="border:1px black solid; width: 300px; height: auto; font-weight: bold;">재고 수정<br></label>
      <span>상품명 :</span>
      <INPUT type="text" size=25 name="product_nm"><br>
      <span>가격 :</span>
      <INPUT type="text" size=25 name="product_price"><br>
      <INPUT type="hidden" name="product_no_pk" value="<?php  $product_no_pk= $_POST["product_no_pk"]; print"$product_no_pk"?>">
      <INPUT type="submit" value="수정">
      <INPUT type="reset" value="취소"><br>
    </form>

  </main>

  <footer>

  </footer>

</body>

</html>