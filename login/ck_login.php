<?php

function login($ID, $PW){
    global $con;
    global $errormsg;

    $ID=$_POST['ID']; 
    $PW=$_POST['PW'];

    $database="warehose";
    $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");

    mysql_select_db($database, $connect);

    if(!isset($_COOKIE["isOK"])){
        $query="select outsrc_no, outsrc_pw from warehouse.outsrc_tb where outsrc_no='$ID'";
        $result=mysql_query($query, $connect);
        $row = mysql_fetch_array($result);
        
        // return $row;
        if($row[0] == ""){
            $errormsg="계정이 없습니다";
            return 0;
        }
        else 
        {
            $dbid = $row[0];
            $dbPW = $row[1];

            if($dbid==$ID AND $dbPW == $PW){
                SetCookie($ID,"isOK", time()+10, "/");
                return 1;
            }

            else {
                $errormsg=$ID."님 패스워드가 틀렸습니다";
                return 0;
            }
        }
    }
    else // if(!isset($isOK)의 else 부분
    {
        SetCookie($ID, "isOK", time()+10, "/");
        return 2;
    }
}


$table="t_cookie";

$con=mysql_connect('localhost', 'root','root');
mysql_select_db('warehouse',$con);  //db 오픈
$login_result = login($ID, $PW);  //앞에서 정의한 login 함수 호출 
//print_r($login_result);
?>

<HTML>
<HEAD><TITLE>로그인</TITLE><meta charset="UTF-8"></HEAD>
<BODY link='white' vlink='white' alink='orange'>
<center>
<?
if($login_result == 0) {  //패스워드가 틀리면 0반환
    print $errormsg."<br>";
   // print "<font color=blue size=4>계정이 없거나 비밀번호가 틀립니다.</font></center><br>";
    print "<table align='center'><tr>
    <td align=center bgcolor='#000099'><font color=white><a href='../index.html'>
    메인화면으로 가기</a></font></td></tr></table></BODY></HTML>";
} 

else 
{
    if($login_result == 1) {  //아이디와 비번 모두 db와 동일하면 
        echo "<script>location.href='../user/user.html'</script>";
    }

    if($login_result == 2) {  //쿠키 이미 가지고 있을 경우 
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