<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <title>Document</title>
</head>

<body>
  <header>
    <a href="../index.html">
      <img src="../logo4.png" alt="">
    </a>
  </header>
  <nav>
    <a href="manager_stock.html">재고</a>
    <a href="manager_out_bound.php">출고</a>
    <a href="manager_in_bound.php">입고</a>
    <a href="manager_membership.php">회원관리</a>
    <a href="manager_logout.php">로그아웃</a>
  </nav>
  <main>
    <h1>관리자</h1>
    출고 조회
    <?php
$modify = $_POST['outsrc_no'];

$database = "warehouse";

$connect=mysql_connect('localhost', 'lcw', 'chaewon')  or die("mySQL ���� ���� Error!");

mysql_select_db($database, $connect);

$query = "SELECT * FROM outsrc WHERE outsrc_no='$modify'";

$result= mysql_query($query, $connect);

 	print "<center><font color=blue size=5><b>��ȸ�� ȭ��  </b></font></center>";
 	print "<table border=1 align=center>";
 	print "<tr><td>��ü��</td><td>��ȭ��ȣ</td><td>����ڹ�ȣ</td><td>��й�ȣ</td></tr><br>";
    



?>

    <div style="position:absolute; right:550px; top: 200x;">
      <form name="form" method="post" action="./manager_modify_input.php">
        <input type="submit" name="outsrc_no" value="����">
      </form>

    </div>


    <?php
    $num= mysql_num_rows($result);

   	 $ans= mysql_fetch_row($result);
   	 print "<tr><td>".$ans[2]."</td><td>".$ans[1]."</td><td>".$ans[0];
     print "<td>".$ans[3]."</td></tr>";



 	print "</table><br>";

 	mysql_close($connect);
    ?>
  </main>
  <footer>

  </footer>

</body>

</html>