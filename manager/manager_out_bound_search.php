<HTML>
<?php
    
//product_sales = 수량 
//수량- 출고량= 남은 수량 
// 상품 조회해서 출고량 입력 후 출고 

    $product_no_pk=$_POST['product_no_pk'];
    

    $database = "warehouse";
    $connect = mysql_connect('localhost','lcw','chaewon')
                        or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);
    $query= "select * from product_tb";

    if($product_no_pk != "")
    $query = "select * from product_tb where product_no_pk like '$product_no_pk'"; 
    
    
    print "<center><font color= black size=5><b>조회 결과 </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> 일련번호</td><td>평점</td><td> 상품명</td><td>수량
    </td><td>가격</td><td>재고량</td><td>상태</td><td>입고일</td><td><center>출고</center></td></tr>";

    $result= mysql_query($query, $connect);
    
    $num= mysql_num_rows($result);

    for($i=0; $i<$num; $i++) {
        $ans= mysql_fetch_row($result);
        $outbound_button = '
        <form action="./manager_out_bound_result.php" method="POST">
        <input type="text" name="outbound_amount" size=20  placeholder="출고량을 입력하세요" required>
        <input type="hidden" name=product_no_pk >
        <input type="submit" value="출고">
        </form>
  ';

        print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "<td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5];
        print "<td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$outbound_button."</td></tr><br>";
    }
    
    print "</table><br>";



    mysql_close($connect); 
    //  <input type=hidden name=product_no_pk >
?>


<!--  
     print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_out_bound.php'></head></head>";
-->

</HTML>