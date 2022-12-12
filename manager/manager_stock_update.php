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
	include '../Check_Cookie_manager.php';
?>
    <h1>관리자</h1>
    <h2>재고</h2>


    <div style="text-align:left;margin:0 40px 0 ;">
      <button type="button" class="navyBtn" onClick="location.href='manager_stock_lookup.php'">재고 조회</button>
      <button type="button" class="navyBtn" onClick="location.href='manager_stock_update.php'">재고 수정</button>
      <br><br>
      <button type="button" class="navyBtn" onClick="location.href='manager_stock_lookup2.php'">재고 상세조회</button>
      <br><br>

    </div>

    <form name="form" action="./manager_stock_update2.php" method="post">
      <label style="border:1px black solid; width: 300px; height: auto; font-weight: bold;">재고 수정<br></label>


      <select name="search">
        <option value="product_no_pk">상품 일련번호</option>
      </select>
      <input type="sumbit" name="search" size="40"> <button>조회</button>
    </form>

  </main>


  <footer>

  </footer>


</body>

</html>