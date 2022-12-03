<HTML>
<?php
    
//product_sales = ���� 
//����- �����= ���� ���� 
// ��ǰ ��ȸ�ؼ� ����� �Է� �� ��� 

    $product_no_pk=$_POST['product_no_pk'];
    echo $product_no_pk; //�� ��µ� 

    $database = "warehouse";
    $connect = mysql_connect('localhost','lcw','chaewon')
                        or die("mySQL ���� ���� Error!");

    mysql_select_db($database, $connect);

    if($product_no_pk != "")
    $query = "select * from product_tb where product_no_pk like '$product_no_pk'"; 
    
    $result= mysql_query($query, $connect);
    
    print "<center><font color= black size=5><b>��ȸ ��� </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> �Ϸù�ȣ</td><td>����</td><td>����</td><td>x
    </td><td>����</td><td>�����</td><td>����</td><td>�԰���</td><td><center>���</center></td></tr>";
    
    $num= mysql_num_rows($result);

    for($i=0; $i<$num; $i++) {
        $ans= mysql_fetch_row($result);
        
        $outbound_button = '
        <form action="./manager_out_bound_result.php" method="POST">
        <input type="text" name="outbound_amount" size=20  placeholder="������� �Է��ϼ���" required>
        <input type="hidden" name="product_no_pk" value="'.$product_no_pk.'">
        <input type="submit" value="���">
        </form>
  ';
  

        print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "<td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5];
        print "<td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$outbound_button."</td></tr><br>";
    }
    
    print "</table><br>";



    mysql_close($connect); 
    //  ���� for���� <input type=hidden name=product_no_pk >  ����� �ʿ� ���� 
?>


<!--  
     print "<HTML><head><META http-equiv='refresh' content='0;
    url=./manager_out_bound.php'></head></head>";
-->

</HTML>