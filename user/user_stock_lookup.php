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
        $year = $_POST["Year"];
        $month = explode("month",$_POST["Month"]);
        $day =explode("day",$_POST["Day"]);
        $month = strval($month[1]);
        $day = strval($day[1]);
        $dt = $year.$month.$day;
        $database = "warehouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        // 입력 날짜와 입고 날짜 비교해서 맞는 것 출력
        $query1 = "select * from inout_tb, product_tb  where inout_tb.product_no_pk  = product_tb.product_NO_PK and $dt = inout_tb.product_dt";
        $result = mysql_query($query1,$connect);
        
        
        
        print "<center><font color=red size=5><b>$dt 날짜별 조회 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 입출고인덱스 </td><td> 입고일 </td><td> 입고량 </td><td> 출고일 </td><td> 출고량 </td>";
        print "<td> 상품일련번호 </td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td><td> 재고량 </td></tr><br>";
        
        $num = mysql_num_rows($result);

        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
            print "<td>".$ans[6]."</td><td>".$ans[9]."</td><td>".$ans[10]."</td><td>".$ans[11]."</td><td>".$ans[12]."</td></tr>";
        }
        print "</table><br>";  //태그추가
        mysql_close($connect)
        

    ?>

  </main>

  <footer>

  </footer>

</body>

</html>