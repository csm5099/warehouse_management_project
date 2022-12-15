<?php
  
  function insert_Data($outsrc_no, $outsrc_telno, $outsrc_nm, $outsrc_pw){
    //12.12 변경
    $join_id = $_POST['decide_id'];


    $database = "warehouse"; 
    
    $connect = mysql_connect('localhost','root','root')  
                or die('mySQL 서버 연결 Error!');
                
    mysql_select_db($database,$connect); 

    $query = "insert into outsrc_tb values('$join_id','$outsrc_telno','$outsrc_nm','$outsrc_pw')"; 
    // 12.12 변경 

    echo "$query";  
    $result = mysql_query($query,$connect);
    
    mysql_close($connect);

    print "<HTML><head><META http-equiv='refresh' content='0;
    url=./registration_complete.php'></head></head>";
}

insert_Data($_POST['outsrc_no'],$_POST['outsrc_telno'],$_POST['outsrc_nm'],$_POST['outsrc_pw']);
echo $outsrc_no;
?>

<!DOCTYPE html>
<html lang="en">

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