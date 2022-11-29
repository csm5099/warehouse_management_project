<?php
    $database="warehouse";
    $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    $uid= $_GET["userid"];  
    $query= "SELECT * FROM outsrc where outsrc_no= '$uid'";
    
    //$result = mysql_query($query, $connect); 
    $result = mysql_query($query, $connect);
    //$num= mysql_num_rows($result);
    $num=mysql_num_rows($result);


    print $num;

    if(!$num){  
        echo "<span style='color:red;'></span> 사용가능합니다.";
       ?>
       
       <p><input type=button value="이 사업자번호를 사용" onclick="opener.parent.decide(); window.close();"></p>
        
    <?php
    }
     else {    

        echo "<span style='color:blue;'></span> 사용불가합니다.";
        ?><p><input type=button value="다른 사업자번호를 사용" onclick="opener.parent.change(); window.close()"></p>
    <?php
    }

   // $outsrc_no = $_POST['decide_id'];   
   //decide_id를 outsrc_no(사업자번호)로 넘겨줌 
?>

