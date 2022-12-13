<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css">
  <title>user</title>
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
    <h2>재고</h2>

    <center>
      <h1>재고 수정</h1>
      <h3>수정할 상품의 일련번호 : <?php echo $no_pk = $_POST["search"];?></h3>

      <form action="manager_stock_update3.php" method="post">
        <span>상품명 :</span>
        <INPUT type="text" size=25 name="product_nm"><br>
        <span>가격 :</span>
        <INPUT type="text" size=26 name="product_price"><br>
        <input type="hidden" name="product_no_pk" value="<?php echo $no_pk; ?>">
        <br>
        <INPUT type="submit" value="수정">
        <INPUT type="reset" value="취소"><br>
      </form>
    </center>

    <?php      
      $database="warehouse";
      $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");
    
      mysql_select_db($database, $connect);
      $query= "SELECT * FROM product_tb";
      $result = mysql_query($query, $connect);
    
      print "<center><h1>재고 조회</h1></center>";
      print "
      <table border=1 align=center>
      <tr>
      <td>사업자번호</td>
      <td>일련번호</td>
      <td>상품명</td>
      <td>판매량</td>
      <td>가격</td>
      <td>재고량</td>
      </tr>";
      
      $num= mysql_num_rows($result);
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