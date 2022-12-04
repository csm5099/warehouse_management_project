<?php

// È¸ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½(registration.html) ï¿½ï¿½ï¿½ï¿½ ï¿½ï¿½ï¿½ï¿½ï¿½Ï¸ï¿½ --ï¿½ï¿½ È¸ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ ï¿½Ï·ï¿½Ç¾ï¿½ï¿½ï¿½ï¿½Ï´ï¿?.  Ã¢ ï¿½ï¿½ï¿½ï¿½Ö´ï¿? ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½

    $database = "warehouse";

    $connect= mysql_connect('localhost','djkim','pass') or die("mySQL ?„œë²? ?—°ê²? Error!");


    mysql_select_db($database, $connect);

    $query = "select * from outsrc";

    $result= mysql_query($query, $connect);

    print "<center><font color=blue size=5><b>?šŒ?›ê°??ž…?´ ?™„ë£Œë˜?—ˆ?Šµ?‹ˆ?‹¤. </b></font></center>";
    print "<table align='center'><tr>
    <td align=center><font color=black><a href='../index.html'>
    ë©”ì¸?™”ë©´ìœ¼ë¡? ê°?ê¸?</a></font></td></tr></table></BODY></HTML>";

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