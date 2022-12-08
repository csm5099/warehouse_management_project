
<?php
    
    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                        or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    #$query_outsrc = "select outsrc_no from outsrc_tb where ";
    $query = "select outsrc_no from outsrc_tb";
    $result = mysql_query ($query, $connect) or die(mysql_error());
    $num = mysql_num_rows($result);

    echo $_COOKIE["user"];
    echo "<br><br><br><br>";
    for($i=0; $i<$num; $i++){
        $ans = mysql_fetch_row($result);
        if($ans[0] == $_COOKIE["user"]){
          print"Ok";
        }
        else{
          echo"<script>alert('로그인을 해주세요!');</script>";
        }
    }

    
    mysql_close($connect)
    
?> 