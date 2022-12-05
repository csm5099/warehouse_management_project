<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
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
    <?php
//���־�ü ���� 


    $outsrc_no = $_POST['outsrc_no'];

    $database = "warehouse";
    $connect = mysql_connect('localhost','root','root')
                        or die("mySQL ���� ���� Error!");

    mysql_select_db($database, $connect);

    $query = "DELETE FROM outsrc WHERE outsrc_no= '$outsrc_no'";
    

    $result = mysql_query($query,$connect);
    print $result;

    mysql_close($connect);
    print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_membership.php'></head></head>";
    
?>

    <hr>
    <input type="button" value="ȸ����� ����" onclick="location.href='./manager_membership.php'">
    <input type="button" value="Ȩ���� ����" onclick="location.href='../index.html'">

  </main>
  <footer>footer</footer>
</body>

</html>