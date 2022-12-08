<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_3_sections.css">
  <title>delivery tracking
  </title>
</head>

<body>
  <header>
    <a href="../index.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <main>
    <h1>배송 조회 결과 창</h1>
    <?php
        $delivery_idt = $_POST["delivery_idt"];
        
        $database = "warehouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        // 입력 날짜와 입고 날짜 비교해서 맞는 것 출력
        $query1 = "select * from delivery_tb, product_tb  where delivery_tb.product_no_pk  = product_tb.product_NO_PK and delivery_idt = '$delivery_idt'";
        $result = mysql_query($query1,$connect) or die(mysql_error());
        
        
        
        print "<center><font color=red size=5><b>$dt 날짜별 조회 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 배송인덱스 </td><td> 송장번호 </td><td> 상품일련번호 </td><td> 배송시작날짜 </td><td> 도착날짜 </td>";
        print "<td> 상품개수 </td><td> 상품이름 </td><td> 상품가격 </td></tr><br>";
        
        $num = mysql_num_rows($result);

        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5]."</td>";
            print "<td>".$ans[8]."</td><td>".$ans[10]."</td></tr><br>";
        }
        print "</table><br>";  //태그추가
        mysql_close($connect)
        

    ?>
  </main>
  <footer>footer</footer>
</body>

</html>