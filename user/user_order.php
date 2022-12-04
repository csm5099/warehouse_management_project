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
    <h1>외주업체</h1>
    <h2>주문</h2>

    <?php
    #변수 선언
    $product_no =  (int)$_POST["product_no"];       //일련번호
    $product_grade =  (int)$_POST["product_grade"]; //평점 
    $product_nm = $_POST["product_nm"];             //상품명
    $product_sales = (int)$_POST["product_sales"];  //수량
    $product_price = (int)$_POST["product_price"];  //가격 
    $product_amt = (int)$_POST["product_amt"];        //재고량  
    $product_state = $_POST["product_state"];       //상태 
    $product_dt = $_POST["product_dt"];             //입고일

    #db 연결
    $database = "warehouse";
    $connect = mysql_connect('localhost','lcw','chaewon')
                        or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);

    #insert 쿼리
    $query1 = "insert into product_tb values('$product_no','$product_grade','$product_nm','$product_sales','$product_price','$product_amt','$product_state','$product_dt')";   
    $result1 = mysql_query($query1,$connect);   
    
    


    print "<center><font color=red size=5><b> 주문 결과입니다. </b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 평점 </td><td> 상품명 </td><td>수량 </td><td> 가격 </td>";
        print "<td> 재고량 </td><td> 상태 </td><td> 입고일 </td></tr><br>";
        
        
        $query = "select * from product_tb where product_no_pk = (select max(product_no_pk) from product_tb)";
        $result = mysql_query($query,$connect);

        $ans = mysql_fetch_row($result);
        print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
        print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
        
        print "</table><br>"; //태그 추가
    mysql_close($connect);

  ?>

  </main>
  <footer>footer</footer>
</body>

</html>