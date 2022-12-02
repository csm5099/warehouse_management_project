<?php

// 입력받은 출고량을 수량에서 - 연산

$outbound_amount = $_POST['outbound_amount']; 
echo "outbound $outbound_amount"; //출고량은 출력됨 

echo("<br>");

$product_no_pk=$_POST['product_no_pk']; 
echo " number $product_no_pk";   //일련번호 안 넘어옴

//수량= product_sales
 
    
    $database="warehouse";
    $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);
    $query = "select * from product_tb where product_no_pk='$product_no_pk'";
    $result = mysql_query($query, $connect);
    $ans = mysql_fetch_row($result);

    $product_sales = $ans[2];
 

    echo("<br>");
    print $product_sales;   // 기존값 출력 안됨  
   
    echo("<br>");
    $rest=$product_sales-$outbound_amount;  // 기존- 출고

    print " rest $rest";

    
    $query = "update product_tb set product_sales='$rest' where product_no_pk= '$product_no_pk'";
    mysql_query($query,$connect);

    print "<center><font color=red size=5><b> 출고 결과 </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> 일련번호 </td><td> 평점 </td><td> 수량 </td><td>x </td><td> 가격 </td>";
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


