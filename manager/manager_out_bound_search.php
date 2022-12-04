<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <header>
    <a href="../login/login.html"> header</a>
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
    
    //product_sales = ���� 
    //����- �����= ���� ���� 
    // ��ǰ ��ȸ�ؼ� ����� �Է� �� ��� 
    
        $product_no_pk=$_POST['product_no_pk'];
        
    
        $database = "warehouse";
        $connect = mysql_connect('localhost','lcw','chaewon')
                            or die("mySQL ���� ���� Error!");
    
        mysql_select_db($database, $connect);
        $query= "select * from product_tb";
    
        if($product_no_pk != "")
        $query = "select * from product_tb where product_no_pk like '$product_no_pk'"; 
        
        
        print "<center><font color= black size=5><b>��ȸ ��� </b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> �Ϸù�ȣ</td><td>����</td><td> ��ǰ��</td><td>����
        </td><td>����</td><td>�����</td><td>����</td><td>�԰���</td><td><center>���</center></td></tr>";
    
        $result= mysql_query($query, $connect);
        
        $num= mysql_num_rows($result);
    
        for($i=0; $i<$num; $i++) {
            $ans= mysql_fetch_row($result);
            $outbound_button = '
            <form action="./manager_out_bound_result.php" method="POST">
            <input type="text" name="outbound_amount" size=20  placeholder="������� �Է��ϼ���" required>
            <input type="hidden" name=product_no_pk >
            <input type="submit" value="���">
            </form>
      ';
    
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "<td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5];
            print "<td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$outbound_button."</td></tr><br>";
        }
        
        print "</table><br>";
    
    
    
        mysql_close($connect); 
        //  <input type=hidden name=product_no_pk >
    ?>


    <!--  
         print "<HTML><head><META http-equiv='refresh' content='0;
        url=./manager_out_bound.php'></head></head>";
    -->
  </main>
  <footer>

  </footer>

</body>

</html>