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
    <h2>회원정보 수정</h2>
    <?php
    #회원정보 수정
    #변수
    $outsrc_no = $_POST["outsrc_no"];
    $new_passwd = $_POST["new_passwd"];
    
    print "입력값 : $outsrc_no $new_passwd";

    #db 연결
    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                        or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);

    if(strlen($new_passwd) < 8){
        echo "<script>alert('비밀번호는 8자리 이상입니다.');</script>";
        echo "<script>history.back();</script>";
    }

    #update 쿼리
    $query1 = "update user set outsrc_passwd = $new_passwd where outsrc_no_pk = $outsrc_no";
    $result1 = mysql_query($query1,$connect);

    #변경 확인
    $query2 = "select * from user where  outsrc_no_pk = $outsrc_no";
    $result2 = mysql_query($query2,$connect);
    $ans = mysql_fetch_row($result2);
    print "<br>회원 수정: $ans[0], $ans[1], $ans[2], $ans[3] <br><br>";



    print "<center><font color=red size=5><b>$dt 회원정보가 정상적으로 수정되었습니다.</b></font></center>";
  ?>
  </main>
  <footer>footer</footer>
</body>

</html>