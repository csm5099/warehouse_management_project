<?php

// 회원가입(registration.html) 에서 제출하면 --님 회원가입이 완료되었습니다.  창 띄워주는 페이지

    $database = "warehouse";

    $connect=mysql_connect('localhost', 'root', 'root')  
    or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    $query = "select * from outsrc";

    $result= mysql_query($query, $connect);

    print "<center><font color=blue size=5><b>회원가입이 완료되었습니다. </b></font></center>";

    print "<table align='center'><tr>
    <td align=center><font color=black><a href='../index.html'>
    메인화면으로 가기</a></font></td></tr></table></BODY></HTML>";
   

    mysql_close($connect);

    ?>

<html>
    <head>
    <meta charset="UTF-8">
</head>
</html>

