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
  <a href="user_stock.html">재고</a>
  <a href="user_out_bound.php">출고</a>
  <a href="user_order.html">주문</a>
  <a href="user_info.html">회원 정보 수정</a>
  <a href="manager_logout.php">로그아웃</a>
</nav>
<main>
  <h1>외주업체</h1>
  <h2>재고</h2>

<?php  
        $nm = $_POST["product_nm"];
        $no = $_POST["product_no"];
        $grade = $_POST["product_grade"];    
        $sales = $_POST["product_sales"];
        $price = $_POST["product_price"];
        $amt = $_POST["product_amt"];
        $state = $_POST["product_state"];
        $dt = $_POST["product_dt"];
        $database = "warehouse";
        $connect = mysql_connect('localhost','lcw','chaewon')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query = "update product_tb set product_no = '$no', product_grade = '$grade', product_sales = '$sales', product_price = '$price', product_amt = '$amt', product_state = '$state', product_dt = '$dt' where product_nm = '$nm'";

        $result = mysql_query($query,$connect);
        echo "<script>alert('수정되었습니다.');</script>";
            mysql_close($connect);    
?> 
</main>
    

<footer>footer</footer>


</body>
</html>