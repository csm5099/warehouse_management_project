<?php
    $database="warehouse";
    $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    $uid= $_GET["userid"];  
    $query= "SELECT * FROM outsrc_tb where outsrc_no= '$uid'";
    
    //$result = mysql_query($query, $connect); 
    $result = mysql_query($query, $connect);
    //$num= mysql_num_rows($result);
    $num=mysql_num_rows($result);


    if(!$num){  
        echo "<span style='color:red;'></span> 사용가능합니다.";
       ?>
       
       <p><input type=button vialue="이 사업자번호를 사용" onclick="opener.parent.decide(); window.close();"></p>
        
    <?php
    }
     else {    

        echo "<span style='color:blue;'></span> 사용불가합니다.";
        ?><p><input type=button value="다른 사업자번호를 사용" onclick="opener.parent.change(); window.close();"></p>
    <?php
    }

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    </body>
    </html>