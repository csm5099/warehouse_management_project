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
        #변수 선언
        $no_pk = (int)$_POST["product_no"];
        $Name = $_POST["product_nm"];
        $Price = (int)$_POST["product_price"];
        $Amt = (int)$_POST["product_amt"];
        $outsrc_no = $_COOKIE["user"];
        
        #db 연결
        $database = "warehouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);

        #insert 쿼리
        $query1 = "insert into product_tb(outsrc_no, product_no_pk, product_nm, product_price, product_amt) value($outsrc_no, $no_pk, '$Name', $Price, $Amt)";
        $result1 = mysql_query($query1,$connect);

        print "<center><h1>새 상품 등록</h1></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 상품명 </td><td> 가격 </td><td> 재고량 </td></tr><br>";
        
        $query = "select * from product_tb where product_no_pk = $no_pk and outsrc_no = $outsrc_no";
        $result = mysql_query($query,$connect); 
        for($i=0; $i<1; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[1]."</td><td>".$ans[2]."</td><td>".$ans[4];
            print "</td><td>".$ans[5]."</td></tr>";
        }
        print "</table><br>";  //태그추가
        mysql_close($connect);

        

    ?>

  </main>

  <footer>

  </footer>

</body>

</html>