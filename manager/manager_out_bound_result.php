<?php

// �Է¹��� ������� �������� - ����

$outbound_amount = $_POST['outbound_amount']; 
echo "outbound $outbound_amount"; //������� ��µ� 

echo("<br>");

$product_no_pk=$_POST['product_no_pk']; 
echo " number $product_no_pk";   //�Ϸù�ȣ �� �Ѿ��

//����= product_sales
 
    
    $database="warehouse";
    $connect= mysql_connect('localhost','root','root') or die("mySQL ���� ���� Error!");

    mysql_select_db($database, $connect);
    $query = "select * from product_tb where product_no_pk='$product_no_pk'";
    $result = mysql_query($query, $connect);
    $ans = mysql_fetch_row($result);

    $product_sales = $ans[2];
 

    echo("<br>");
    print $product_sales;   // ������ ��� �ȵ�  
   
    echo("<br>");
    $rest=$product_sales-$outbound_amount;  // ����- ���

    print " rest $rest";

    
    $query = "update product_tb set product_sales='$rest' where product_no_pk= '$product_no_pk'";
    mysql_query($query,$connect);

    print "<center><font color=red size=5><b> ��� ��� </b></font></center>";
    print "<table border=1 align=center>";
    print "<tr><td> �Ϸù�ȣ </td><td> ���� </td><td> ���� </td><td>x </td><td> ���� </td>";
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