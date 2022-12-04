<?php

// 입력받은 출고량을 수량에서 - 연산

$outbound_amount = $_POST['outbound_amount']; //수량
echo $outbound_amount;
$product_no_pk=$_POST['product_no_pk']; 
echo $product_no_pk;//manger_out_bound_search.php 에서 일련번호를 hidden으로 받음 

//수량= product_sales

    $result=$product_sales-$outbound_amount;
    
    $database="warehouse";
    $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    //select a* b from product_tb;
    $query = "update product_tb set product_sales='$result' where product_no_pk= '$product_no_pk'";

    $result = mysql_query($query, $connect);



    print "<center><font color=red size=5><b> 출고 결과 </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> 일련번호 </td><td> 평점 </td><td> 상품명 </td><td>수량 </td><td> 가격 </td>";
    print "<td> 재고량 </td><td> 상태 </td><td> 입고일 </td></tr><br>";
    
    
    $query = "select * from product_tb where product_no_pk= '$product_no_pk' ";
    $result = mysql_query($query,$connect);
    $ans = mysql_fetch_row($result);
    print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
    print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
    print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
    
    print "</table><br>"; //태그 추가


    mysql_close($connect);



?>


