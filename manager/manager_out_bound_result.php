<?php

// �Է¹��� ������� �������� - ����

$outbound_amount = $_POST['outbound_amount']; //����
echo $outbound_amount;
$product_no_pk=$_POST['product_no_pk']; 
echo $product_no_pk;//manger_out_bound_search.php ���� �Ϸù�ȣ�� hidden���� ���� 

//����= product_sales

    $result=$product_sales-$outbound_amount;
    
    $database="warehouse";
    $connect= mysql_connect('localhost','root','root') or die("mySQL ���� ���� Error!");

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