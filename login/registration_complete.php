<?php

// ȸ������(registration.html) ���� �����ϸ� --�� ȸ�������� �Ϸ�Ǿ����ϴ�?.  â ����ִ�? ������

    $database = "warehouse";

    $connect= mysql_connect('localhost','djkim','pass') or die("mySQL ?���? ?���? Error!");


    mysql_select_db($database, $connect);

    $query = "select * from outsrc";

    $result= mysql_query($query, $connect);

    print "<center><font color=blue size=5><b>?��?���??��?�� ?��료되?��?��?��?��. </b></font></center>";
    print "<table align='center'><tr>
    <td align=center><font color=black><a href='../index.html'>
    메인?��면으�? �?�?</a></font></td></tr></table></BODY></HTML>";

    mysql_close($connect);

    echo "$outsrc_no";

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