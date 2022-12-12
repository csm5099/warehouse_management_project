
<?php
    
    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                        or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    $cookie = $_COOKIE["manager"];
    $query = "select outsrc_no from outsrc_tb where outsrc_no = $cookie";
    $result = mysql_query ($query, $connect);
    if($result){

    }
    else{
      echo"<script>alert('로그인을 해주세요!');</script>";
    #  echo"<script> document.location.href='../login/login.html'; </script>"; 
    }
    
    mysql_close($connect)
    
?> 