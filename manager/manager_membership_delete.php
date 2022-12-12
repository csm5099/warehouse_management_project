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
    <a href="./manager.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>

  <nav>
    <a href="manager_stock.html">재고</a>
    <a href="manager_out_bound.php">출고</a>
    <a href="manager_in_bound.php">입고</a>
    <a href="manager_membership.php">회원관리</a>
    <a href="manager_logout.php">로그아웃</a>
  </nav>

  <main>
    <?php

include '../Check_Cookie_manager.php';

    $outsrc_no = $_POST["outsrc_no"];
 
    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);

    $query = "DELETE FROM outsrc_tb WHERE outsrc_no = '$outsrc_no'";
    $result = mysql_query($query,$connect);
    
    mysql_close($connect);
        
    // 사업자번호로 삭제한 뒤에 그대로 화면 출력 

    print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_membership.php'></head></head>";

    ?>

  </main>
  <footer>

  </footer>
</body>

</html>