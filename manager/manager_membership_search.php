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
  <a href=""></a>
</nav>

<main>
<?php
	include '../Check_Cookie.php';
?>
  <h1>관리자</h1>
  <h2>회원관리</h2>

    <?php
        $outsrc_no = $_POST["outsrc_no"];
 
        $database = "warehouse";
        $connect = mysql_connect('localhost','root','chaewon')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query = "select * from outsrc_tb where outsrc_no = '$outsrc_no'";
        $result = mysql_query($query,$connect);

        print "<center><font color=red size=5><b>회원 조회 결과</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 사업자번호 </td><td> 전화번호 </td><td> 업체명 </td><td> 비밀번호 </td></tr><br>";

        $num = mysql_num_rows($result);
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td></tr><br>";
        }
        mysql_close($connect);

        ?>
        
        </main>
        <footer>footer</footer>
        </body>
        </html>
        
