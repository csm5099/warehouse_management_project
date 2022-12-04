<?php

function login($ID, $PW){
    global $con;
    //global $table;
    global $errormsg;

    $ID=$_POST['ID']; 
    $PW=$_POST['PW'];

    echo "$ID";
    echo "<br>";
    echo "$PW";  

    if(!isset($_COOKIE["isOK"])){

        $query="SELECT outsrc_no, outsrc_pw FROM warehouse.outsrc_tb WHERE outsrc_no='$ID'";
        $result=mysql_query($query, $con);
        // $connect-> $con 으로 변경
        $row = mysql_fetch_array($result);

        if($row[0] == ""){
            $errormsg="계정이 없습니다";
            return 0;
        }
        else 
        {
            $dbid=$row[0];
            $dbPW = $row[1];

            if($dbid==$ID AND $dbPW == $PW){
                SetCookie($ID,"isOK",time()+10, "/");  //순서 변경 
                return 1;
            }

            else {
                $errormsg=$ID."님 패스워드가 틀렸습니다";
                return 0;
            }
        }
    }
    else // if(!isset($isOK)의 else
    {
        SetCookie($ID,"isOK",time()+10, "/");
        return 2;
    }
}

//$table="t_cookie";

$con=mysql_connect('localhost', 'lcw','chaewon');
mysql_select_db('warehouse',$con);  
$login_result = login($ID, $PW);  
//print_r($login_result);
?>

<HTML>
<HEAD><TITLE>로그인</TITLE><meta charset="UTF-8"></HEAD>
<BODY link='white' vlink='white' alink='orange'>
<center>
<?   
if($login_result == 0) {  
    print $errormsg."<br>";
  
    print "<table align='center'><tr>
    <td align=center bgcolor='#000099'><font color=white><a href='../index.html'>
    메인화면으로 가기</a></font></td></tr></table></BODY></HTML>";
} 

else 
{
    if($login_result == 1) {  
        echo "<script>location.href='../user/user.html'</script>";
    }

    if($login_result == 2) {  
        print $_POST['ID']."님 이미 인증되신 분입니다.  
            <br>유효시간이 10초 연장되었습니다"; 
    }
}
?>


</center>

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