<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
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
	include '../Check_Cookie.php';
?>
    <h1>관리자</h1>
    <h2>재고</h2>
    <?php
        #변수 선언
        $no_pk = (int)$_POST["product_no"];
        $Name = $_POST["product_nm"];
        $Price = (int)$_POST["product_price"];
        $Amt = 0;
        
        #db 연결
        $database = "warehouse";
        $connect = mysql_connect('localhost','lcw','chaewon')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);

       # $query = "select * from product_tb where product_no_pk = (select max(product_no_pk) from product_tb)";
       # $result = mysql_query($query,$connect);
       # $ans = mysql_fetch_row($result);
       # $no_pk = (int)$ans[0]+1;
       # print "$no_pk";

        #insert 쿼리
        $query1 = "insert into product_tb(product_no_pk, product_nm, product_price, product_amt) values($no_pk,$Name,$Price,$Amt)";
        $result1 = mysql_query($query1,$connect);

        print "<center><font color=red size=5><b>$dt 재고 추가 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 상품명 </td><td> 가격 </td><td> 재고량 </td></tr><br>";
        
        $query = "select product_no_pk, product_nm, product_price, product_amt  from product_tb where product_no_pk = $no_pk";
        $result = mysql_query($query,$connect);
        for($i=0; $i<1; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td></tr><br>";
        }
        print "</table><br>";  //태그추가
        mysql_close($connect);

        

    ?>

  </main>


  <footer>footer</footer>


</body>

</html>