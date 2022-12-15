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
        $no = $_POST["product_no_pk"];
        $nm = $_POST["product_nm"];
        $price = $_POST["product_price"];
        $database = "warehouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query1 = "update product_tb set product_no_pk = '$no', product_price = '$price',  product_nm = '$nm' where product_no_pk = '$no'";
        $result1 = mysql_query($query1,$connect);

        print "<center><font color=red size=5><b>$dt 재고 수정 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 상품명 </td><td> 가격 </td></tr><br>";
        
        $query = "select product_no_pk, product_nm, product_price from product_tb where product_no_pk = '$no'";
        $result = mysql_query($query,$connect);
        $num = mysql_num_rows($result);
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td></tr>";
        }
        print "</table>";



            mysql_close($connect);    
?>
  </main>

  <footer>

  </footer>

</body>

</html>