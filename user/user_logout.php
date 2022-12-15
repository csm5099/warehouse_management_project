<?
  if(isset($_COOKIE["isOK"])) {
    SetCookie("isOK", $userid, time()-5000, "/");
    $msg="<font color=blue sixe=5>Goodbye!!!</font><br> "; 
  }
  else {
    $msg="<font color=blue sixe=5>Goodbye!!!</font><br>"; 
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그아웃</title>
</head>

<body>
  <center>
    <?=$msg?>
    <font color=blue size=3>로그아웃에 성공했습니다.</font>
    <hr>
  </center>
  <table align='center'>
    <tr>
      <td align=center>
        <font color=white>
          <a href='../index.html'>홈페이지로 돌아갑니다.</a>
        </font>
      </td>
    </tr>
  </table>
</body>

</html>