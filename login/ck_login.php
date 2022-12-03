<?php

function login($ID, $PW){
    global $con;
    global $table;
    global $errormsg;

    $ID=$_POST['ID']; 
    $PW=$_POST['PW'];

    echo "$ID";
    echo"<br>";
    echo "$PW";  
    // ������ �Ѿ�� 

    if(!isset($_COOKIE["isOK"])){
        $query="select outsrc_no, outsrc_pw from warehouse.outsrc_tb where outsrc_no='$ID'";
        $result=mysql_query($query, $connect);
        $row = mysql_fetch_array($result);
        // return $row;

        if($row[0] == ""){
            $errormsg="������ �����ϴ�";
            return 0;
        }
        else 
        {
            $dbid=$row[0];
            $dbPW = $row[1];

            if($dbid==$ID AND $dbPW == $PW){
                SetCookie("isOK", $ID, time()+10, "/");
                return 1;
            }

            else {
                $errormsg=$ID."�� �н����尡 Ʋ�Ƚ��ϴ�";
                return 0;
            }
        }
    }
    else // if(!isset($isOK)�� else �κ�
    {
        SetCookie("isOK", $ID, time()+10, "/");
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
<?  // 8�ڸ� �̻�, ��ҹ��� ��� 
if($login_result == 0) {  //�н����尡 Ʋ���� 0��ȯ
    print $errormsg."<br>";
   // print "<font color=blue size=4>������ ���ų� ��й�ȣ�� Ʋ���ϴ�.</font></center><br>";
    print "<table align='center'><tr>
    <td align=center bgcolor='#000099'><font color=white><a href='../index.html'>
    ����ȭ������ ����</a></font></td></tr></table></BODY></HTML>";
} 

else 
{
    if($login_result == 1) {  //���̵�� ��� ��� db�� �����ϸ� 
        echo "<script>location.href='../user/user.html'</script>";
    }

    if($login_result == 2) {  //��Ű �̹� ������ ���� ��� 
        print $_POST['ID']."�� �̹� �����ǽ� ���Դϴ�. 
            <br>��ȿ�ð��� 10�� ����Ǿ����ϴ�"; 
    }
}
?>


</center>