<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <title>Document</title>
</head>

<body>
  <header>
    <a href="./manager.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <nav>
    <a href="manager_stock.html">재고</a>
    <a href="manager_out_bound.php">출고</a>
    <a href="manager_in_bound.php">입고</a>
    <a href="manager_membership.php">회원관리</a>
    <a href="manager_logout.php">로그아웃</a>
  </nav>
  <main>

    <h1>관리자</h1>
    <h2>출고 조회</h2>

    <?php
      include '../Check_Cookie_manager.php';

      $database="warehouse";
      $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");
      mysql_select_db($database, $connect);

      $delivery=$_POST['delivery_no'];
      $present_dt = (string)date("Ymd");
      
      // $query2 = "select delivery_adt from delivery_tb, product_tb  where delivery_tb.product_no_pk  = product_tb.product_NO_PK && delivery_tb.product_no_pk = $no_pk";
      // $result2 = mysql_query($query2, $connect);
      // $ans1=mysql_fetch_row($result2);
      
      // (int)$delivery_adt=$ans1[0];
      // (int)$present_dt;

      // if($delivery_adt<$present_dt)
      //     echo "현재 배송중입니다.";
      // else  
      //     echo "상품이 도착했습니다.";  

      //$query= "select * from delivery_tb, product_tb where delivery_tb.product_no_pk  = product_tb.product_NO_PK;";

      $query =
      "SELECT *
      FROM delivery_tb D, product_tb P
      WHERE D.product_no_pk = P.product_no_pk
      AND D.delivery_idt = '$delivery'
      ";
      $result = mysql_query($query, $connect);

      print "<center><h1>출고 조회</h1></center>";
      print "<table border=1 align=center>";
      print
      "<tr>
      <td> 인덱스</td>
      <td> 송장번호</td>
      <td> 일련번호</td>
      <td> 배송일자</td>
      <td> 도착일자</td>
      <td> 배송수량</td>
      <td> 사업자</td>
      <td> 일련번호</td>
      <td> 상품명</td>
      <td> 판매량</td>
      <td> 가격</td>
      <td> 재고량</td>
      </tr>";
      $num=mysql_num_rows($result);       

      for($i=0; $i<$num; $i++) {
        $ans=mysql_fetch_row($result);
        print
        "<tr>
        <td>".$ans[0]."</td>
        <td>".$ans[1]."</td>
        <td>".$ans[2]."</td>
        <td>".$ans[3]."</td>
        <td>".$ans[4]."</td>
        <td>".$ans[5]."</td>
        <td>".$ans[6]."</td>
        <td>".$ans[7]."</td>
        <td>".$ans[8]."</td>
        <td>".$ans[9]."</td>
        <td>".$ans[10]."</td>
        <td>".$ans[11]."</td>
        </tr>";
      }
      print "</table>";
      mysql_close($connect);
    ?>
  </main>
  <footer>

  </footer>
</body>

</html>