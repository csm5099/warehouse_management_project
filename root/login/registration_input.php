<?php
  
  function insert_Data($outsrc_no, $outsrc_telno, $outsrc_nm, $outsrc_pw){
    $database = "warehouse"; 
    
    $connect = mysql_connect('localhost','lcw','chaewon')  
                or die('mySQL ���� ���� Error!');
                
    mysql_select_db($database,$connect); 

    $query = "insert into outsrc values('$outsrc_no','$outsrc_telno','$outsrc_nm','$outsrc_pw')"; 
    echo "$query";  
    $result = mysql_query($query,$connect);
    
    mysql_close($connect);


    print "<HTML><head><META http-equiv='refresh' content='0;
    url=./registration_complete.php'></head></head>";
}

insert_Data($_POST['outsrc_no'],$_POST['outsrc_telno'],$_POST['outsrc_nm'],$_POST['outsrc_pw']);

?>