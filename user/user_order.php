<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <title>user</title>
</head>

<body>
  <header>
    <a href="../index.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <nav>
    <a href="user_stock.html">재고</a>
    <a href="user_out_bound.html">출고</a>
    <a href="user_order.html">주문</a>
    <a href="user_info.html">회원 정보 수정</a>
  </nav>
  <main>
  <?php
	include '../Check_Cookie.php';
?>
  <h1>외주업체</h1>
  <h2>주문</h2>

  <?php
    #변수 선언
    $delevery_idt =  $_POST["delevery_idt"]; //송장번호
    $product_no =  (int)$_POST["product_no"];       //일련번호
    $product_amt = $_POST["product_amt"];             //수량
    $product_dt = (string)date("Ymd");
    $product_adt = (int)$product_dt + 3;
    $product_adt = (string)$product_adt;
    $delevery_idt = (string)$delevery_idt;
    #db 연결
    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                        or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    print "$delevery_idt";
    #insert 쿼리
    $query1 = "insert into delivery_tb values('','$delevery_idt','$product_no','$product_dt','$product_adt', $product_amt)";   
    $result1 = mysql_query($query1,$connect);   

    $query2 = "select * from delivery_tb where DELIVERY_IDT = '$delevery_idt'";
        $result2 = mysql_query ($query2, $connect)or die(mysql_error());
        $num = mysql_num_rows($result2);

    print "<center><font color=red size=5><b> 주문 결과입니다. </b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 배송인덱스 </td><td> 송장번호 </td><td> 상품일련번호 </td><td> 배송날짜 </td><td> 도착날짜 </td>";
        print "<td> 상품개수 </td></tr><br>";
      
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result2);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
            print "<td>".$ans[5]."</td></tr><br>";
        }
        
        print "</table><br>"; //태그 추가
    mysql_close($connect);

  ?>

</main>
  <footer>footer</footer>
</body>

</html>