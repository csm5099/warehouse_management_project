<?php
    $ID=$_POST['ID']; 
    $PW=$_POST['PW'];
    $idtype=$_POST['idtype']; 

function login($ID, $PW, $idtype){
    global $con;
    //global $table;
    global $errormsg;

    $database="warehouse";
    $connect= mysql_connect('localhost','root','root') or die("mySQL 서버 연결 Error!");

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
$con=mysql_connect('localhost', 'root','root');
mysql_select_db('pass',$con);  //db 오픈
$login_result = login($ID, $PW, $idtype);  //앞에서 정의한 login 함수 호출 
?>
<HTML>
<HEAD><TITLE>로그인</TITLE></HEAD>
<BODY link='white' vlink='white' alink='orange'>
<center>
<?  
if($login_result == 0) {  
    print $errormsg."<br>";
    print "<table align='center'><tr>
    <td align=center bgcolor='#000099'><font color=white><a href='../login/login.html'>
    로그인화면으로 가기</a></font></td></tr></table></BODY></HTML>";
} 

else 
{
    if($login_result == 1) { 
        if($idtype==1){
            echo "<script>location.href='../manager/manager.html'</script>";
        }
        else{
            echo "<script>location.href='../user/user.html'</script>";
        }
    }
}   

?>


</center>



