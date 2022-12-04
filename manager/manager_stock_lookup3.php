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
  <h2>재고</h2>

  <div style="text-align:left;margin:0 40px 0 ;">
    <button type="button" class="navyBtn" onClick="location.href='manager_stock_lookup.php'">재고 조회</button>
    <button type="button" class="navyBtn" onClick="location.href='manager_stock_update.php'">재고 수정</button>
    <br><br>
    <button type="button" class="navyBtn" onClick="location.href='manager_stock_lookup2.php'">재고 상세조회</button>
    <br><br>

    </div>

<?php
        $product_no_pk= (int)$_POST["product_no_pk"];


        $database = "warehouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query = "select * from product_tb where product_no_pk = '$product_no_pk'";


        $result = mysql_query($query,$connect);

        print "<center><font color=black size=5><b>재고 상세 조회</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 사업자번호 </td><td> 일련번호</td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td><td> 재고량 </td></tr><br>";

        $num = mysql_num_rows($result);
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5]."</td></tr><br>";
        }
        mysql_close($connect);
  ?>

</main>
<footer>footer</footer>
</body>
</html>







