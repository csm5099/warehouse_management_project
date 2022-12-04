<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css">
  <title>manager</title>
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
    <h1>관리자</h1>
    <h2>재고</h2>
    <?php
        #변수 선언
        $Name = $_POST["name"];
        $Sales = (int)$_POST["sales"];
        $Price = (int)$_POST["price"];
        $Amt = (int)$_POST["amt"];
        $State = $_POST["state"];
        $Dt = $_POST["dt"];
        $Grade = (int)$_POST["grade"];
        
        #db 연결
        $database = "warehouse";
        $connect = mysql_connect('localhost','lcw','chaewon')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);

        #NO_PK 최대값 구하기
        $query = "select * from product_tb where product_no_pk = (select max(product_no_pk) from product_tb)";
        $result = mysql_query($query,$connect);
        $ans = mysql_fetch_row($result);
        $no_pk = (int)$ans[0]+1;
        print "$no_pk";
        #insert 쿼리
        $query1 = "insert into product_tb values($no_pk,$Grade,$Name,$Sales,$Price,$Amt,,$Dt)";
        $result1 = mysql_query($query,$connect);

        print "<center><font color=red size=5><b>$dt 재고 추가 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 평점 </td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td>";
        print "<td> 재고량 </td><td> 상태 </td><td> 입고일 </td></tr><br>";
        ;
        
        $query = "select * from product_tb where product_no_pk = (select max(product_no_pk) from product_tb)";
        $result = mysql_query($query,$connect);
        for($i=0; $i<1; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
            print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
        }

        mysql_close($connect);

   

    ?>

  </main>


  <footer>footer</footer>


</body>

</html>