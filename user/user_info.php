<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_3_sections.css">
  <link rel="stylesheet" href="./user_info.css">
  <title>user</title>
</head>

<body>
  <header>
    <a href="./user.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <main>
    <?php
	include '../Check_Cookie.php';
?>
    <h1>외주업체</h1>
    <h2>회원정보 수정</h2>
    <?php
    #회원정보 수정
    #변수
    $outsrc_no = $_POST["outsrc_no"];
    $new_passwd = $_POST["new_passwd"];
    
    // print "입력값 : $outsrc_no $new_passwd";

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
    // print "<br>회원 수정: $ans[0], $ans[1], $ans[2], $ans[3] <br><br>";



    print "<center><font color=red size=5><b>$dt 회원정보가 정상적으로 수정되었습니다.</b></font></center>";
  ?>
    <hr>
    <center>
      <input class="prepage" type="button" value="돌아가기" onclick="location.href='../login/login.html'">
    </center>
    <hr>
  </main>
  <footer>

  </footer>
</body>

</html>