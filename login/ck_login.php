<?php
    $ID=$_POST['ID']; 
    $PW=$_POST['PW'];
    $idtype=$_POST['idtype']; 

function login($ID, $PW, $idtype){
    global $con;
    global $table;
    global $errormsg;

    $database="warehouse";
    $connect= mysql_connect('localhost','djkim','pass') or die("mySQL 서버 연결 Error!");

            mysql_select_db($database, $connect);
    $query="select outsrc_no, outsrc_pw from warehouse.outsrc_tb where outsrc_no='$ID'";
    $result=mysql_query($query, $connect);
    $row = mysql_fetch_array($result);
    
    $dbid=$row[0];
    $dbPW=$row[1];

    if($idtype==1 AND $ID==1){
    
        if(!isset($_COOKIE["manager"])){
            
            if($row[0] == ""){
                $errormsg="관리자 계정이 아닙니다";
                return 0; 
            }
            else {
               
                if($dbid==$ID AND $dbPW == $PW){
                    SetCookie("manager", $ID, time()+10, "/");
                    return 1;
                }
                else {
                    $errormsg="관리자님 패스워드가 틀렸습니다";
                    return 0;
                }
            }
        }
        elseif($dbid==$ID AND $dbPW == $PW ){
                SetCookie("manager", $ID, time()+10, "/");
                return 1;
        }
        
    }

    else{   
        if($idtype==2 AND $ID!=1){
           
            if(!isset($_COOKIE["user"])){
                                
                // return $row;
                if($row[0] == ""){
                    $errormsg=" 계정이 없습니다";
                    return 0;
                }
                else 
                {                
                    if($dbid==$ID AND $dbPW == $PW ){
                        SetCookie("user", $ID, time()+10, "/");
                        return 1;
                    }
                    else {
                        $errormsg= $ID."님 패스워드가 틀렸습니다";
                        return 0;
                    }
                }
            }
            else if($dbid==$ID AND $dbPW == $PW ){
                SetCookie("user", $ID, time()+10, "/");
                return 1;
            }
        }
        else{
            $errormsg="접근할수 없는 계정입니다";
        }
    }
}

$table="t_cookie";
$con=mysql_connect('localhost', 'djkim','pass');
mysql_select_db('pass',$con);  //db 오픈
$login_result = login($ID, $PW, $idtype);  //앞에서 정의한 login 함수 호출 
?>
<HTML>
<HEAD><TITLE>로그인</TITLE></HEAD>
<BODY link='white' vlink='white' alink='orange'>
<center>
<?
if($login_result == 0) {  //패스워드가 틀리면 0반환
    print $errormsg."<br><br>";
    print "<table align='center'><tr>
    <td align=center bgcolor='#000099'><font color=white><a href='../login/login.html'>
    로그인 화면으로 가기</a></font></td></tr></table></BODY></HTML>";
   
} 
else {
        print $idtype;
        if($idtype==1){  //아이디와 비번 모두 db와 동일하면 
        echo "<script>location.href='../manager/manager.html'</script>";
        }else
        echo "<script>location.href='../user/user.html'</script>";
}
//print $login_result;
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