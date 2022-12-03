<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="main_menu.css">
  <link rel="stylesheet" href="manager.css">
  <title>user</title>
</head>
<body>
  <header>
    <a href="../login/login.html"> header</a>
  </header>
<nav>
<a href="manager_stock.html">재고</a>
  <a href="manager_out_bound.php">출고</a>
  <a href="manager_in_bound.php">입고</a>
  <a href="manager_membership.php">회원관리</a>
  <a href="manager_logout.php">로그아웃</a>

</nav>
<main>
  <h1>외주업체</h1>
  <h2>재고</h2>
    <?php
        $name = $_POST["consumerName"];
        $database = "wareouse";
        $connect = mysql_connect('localhost','lcw','chaewon')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query = "select * from product_tb where product_nm = '$name'"; //manager_stock.html에서 입력받은 상품명이 포함된 데이터검색
        $result = mysql_query($query,$connect);

        print "$product_dt";
        
        print "<center><font color=black size=5><b>상품명 조회 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 평점 </td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td>";
        print "<td> 재고량 </td><td> 상태 </td><td> 입고일 </td></tr><br>";
        $num = mysql_num_rows($result);
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
            print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
        }
 mysql_close($connect);

?> 

<form action="manager_stock_update2.php"  method="post">
<label style="border:1px black solid; width: 300px; height: auto; font-weight: bold;">재고 수정<br></label>
상품명 : <?php print"$name <br>"?>
<INPUT type="hidden"  id="product_nm" name="product_nm" value="<?php echo $name?>" />
일련번호 : <INPUT type="text" size=5 name="product_no" ><br>
평점 : <INPUT type="text" size=5 name="product_grade" ><br>
판매량 : <INPUT type="text" size=5 name="product_sales" ><br>
가격 : <INPUT type="text" size=5 name="product_price" ><br>
재고량  : <INPUT type="text" size=5 name="product_amt" ><br>
상태 : <INPUT type="text" size=5 name="product_state" ><br>
입고일 : <INPUT type="text" size=5 name="product_dt" ><br>
<INPUT type="submit" value="수정"> <INPUT type="reset" value="취소"><br>	
</form>

</main>
    

<footer>footer</footer>


</body>
</html>