<HTML>
<meta charset="UTF-8">
<?php
        $database="wearhouse";
        $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");
    
        mysql_select_db($database, $connect);
    
        $no_pk=$_POST['product_no_pk'];
        $query2 = "select delevery_adt from delivery_tb, product_tb  where delivery_tb.product_no_pk  = product_tb.product_NO_PK && delivery_tb.product_no_pk = $no_pk";
        
        $present_dt = (string)date("Ymd");
        $result2 = mysql_query($query2, $connect);
        $ans1=mysql_fetch_row($result2);

        (int)$delevery_adt=$ans1[0];
        (int)$present_dt;

    if($delevery_adt<$present_dt)
        echo "현재 배송중입니다.";
    else    
        echo "상품이 도착했습니다.";  

        $query= "select * from delivery_tb, product_tb  where delivery_tb.product_no_pk  = product_tb.product_NO_PK;";
        $result = mysql_query($query, $connect);

        print "<center><font color=black size=5><b>입고현황</b></font></center>";
        print "<table border=1 align=center>";
        
        print "<tr><td> 인덱스</td><td> 송장번호</td><td> 일련번호</td>
        <td> 배송일자</td><td> 도착일자</td><td> 배송수량</td>
        <td> 사업자</td><td> 일련번호</td><td>상품명</td><td>판매량
        </td><td>가격</td><td>재고량</td></tr>";
      
        $num=mysql_num_rows($result);
       
        
        for($i=0; $i<$num; $i++) {
          $ans=mysql_fetch_row($result);
        
          print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
          print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
          print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$ans[8]."</td>
          <td>".$ans[9]."</td><td>".$ans[10]."</td><td>".$ans[11]."</td></tr><br>";
          }
        
          print "</table>";

    mysql_close($connect);
?>

<!--  
     print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_out_bound.php'></head></head>";
-->

</HTML>