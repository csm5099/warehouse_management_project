<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css">
</head>
<link rel="stylesheet" href="../grid_4_sections.css">
<title>manager</title>
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
    <?php
	    include '../Check_Cookie_manager.php';
    ?>

    <h1>관리자</h1>
    <h2>입고관리</h2>

    <?php
    $database="warehouse";
    $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    $query= "SELECT * FROM product_tb";

    $query= 
    "SELECT *
    FROM product_tb P, delivery_tb D
    WHERE P.product_no_pk = D.product_no_pk
    ";

    $result = mysql_query($query, $connect);

    print "<center><h1>입고 조회 결과</h1></center>";
    print "<table border=1 align=center>";
    print
    "<tr>
    <td> 외주 업체</td>
    <td> 상품 일련 번호</td>
    <td> 상품명</td>
    <td> 현 재고량</td>
    </tr>";

    $num= mysql_num_rows($result);
    for($i=0; $i<$num; $i++) {
      $ans=mysql_fetch_row($result);
      print
      "<tr>
      <td>".$ans[0]."</td>
      <td>".$ans[1]."</td>
      <td>".$ans[2]."</td>
      <td>".$ans[5]."</td>
      </tr>
      ";
    }
    print "</table>";
    mysql_close($connect);
  ?>
  </main>
  <footer>

  </footer>
</body>

</html>