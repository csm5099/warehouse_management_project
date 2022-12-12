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
    <a href="./manager.html">
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
	include '../Check_Cookie.php';
?>
    <h1>관리자</h1>
    출고 조회 결과
    <?php

// �Է¹��� ������� �������� - ����

$outbound_amount = $_POST['outbound_amount']; //����
echo $outbound_amount;
$product_no_pk=$_POST['product_no_pk']; 
echo $product_no_pk;//manger_out_bound_search.php ���� �Ϸù�ȣ�� hidden���� ���� 

//����= product_sales

    $result=$product_sales-$outbound_amount;
    
    $database="warehouse";
    $connect= mysql_connect('localhost','lcw','chaewon') or die("mySQL ���� ���� Error!");

    mysql_select_db($database, $connect);

    //select a* b from product_tb;
    $query = "update product_tb set product_sales='$result' where product_no_pk= '$product_no_pk'";

    $result = mysql_query($query, $connect);

    print "<center><font color=red size=5><b> ��� ��� </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> �Ϸù�ȣ </td><td> ���� </td><td> ��ǰ�� </td><td>���� </td><td> ���� </td>";
    print "<td> ����� </td><td> ���� </td><td> �԰��� </td></tr><br>";
    
    $query = "select * from product_tb where product_no_pk= '$product_no_pk' ";
    $result = mysql_query($query,$connect);
    $ans = mysql_fetch_row($result);
    print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
    print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
    print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
    
    print "</table><br>"; //�±� �߰�

    mysql_close($connect);

?>


    <!--  
      print "<HTML><head><META http-equiv='refresh' content='0;
      url=./manager_out_bound.php'></head></head>";
    -->
  </main>
  <footer>
    footer
  </footer>

</body>

</html>