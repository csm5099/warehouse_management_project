<?php
//외주업체 삭제 
 

    $outsrc_no = $_POST['outsrc_no'];

    $database = "warehouse";
    $connect = mysql_connect('localhost','lcw','chaewon')
                        or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    $query = "DELETE FROM outsrc WHERE outsrc_no= '$outsrc_no'";
    
  
    $result = mysql_query($query,$connect);
    print $result;

    mysql_close($connect);
    print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_membership.php'></head></head>";
    
?>

<hr>
<input type="button" value="회원목록 보기" onclick="location.href='./manager_membership.php'"> 
<input type="button" value="홈으로 가기" onclick="location.href='../index.html'">
