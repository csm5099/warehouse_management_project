<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../grid_4_sections.css">
  <link rel="stylesheet" href="manager.css">
  <title>user</title>
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
  <h2>재고</h2>

<form action="manager_stock_update3.php"  method="post">
<label style="border:1px black solid; width: 300px; height: auto; font-weight: bold;">재고 수정<br></label>
상품명 : <INPUT type="text" size=5 name="product_nm" ><br>
가격 : <INPUT type="text" size=5 name="product_price" ><br>
<input type = "hidden" name = "product_no_pk" value ="<?php  $product_no_pk= $_POST["search"]; ?>"> 
<INPUT type="submit" value="수정"> <INPUT type="reset" value="취소"><br>   
</form>

  <?php
    $product_no_pk= $_POST["search"];
    

  ?>
</main>
  
<footer>footer</footer>
</body>
</html>