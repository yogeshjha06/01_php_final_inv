<head>
    <style>


      table {
                border: 1px solid;
            }
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #8A2BE2;
            position: -webkit-sticky; /* Safari */
            position: sticky;
            top: 0;
          }

          li {
            float: left;
          }

          li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
          }

          li a:hover {
            background-color: #BA55D2;
          }
            .active {
          background-color: #BA55D3;
        }

        

    </style>
<ul>
  <?php
error_reporting(0);
  echo"
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Client</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a class='active' href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<input class='btn btn-outline-success' value="Downlode Report" type="button" onclick="window.print()" />
<center>
<h5 >Purchase Report</h5>
<form>
  <table id="customers">
    <tr>
      <th>SN</th>
      <th>Recipit No</th>
      <th>Date</th>
      <th>Quantity</th>
      <th>Item</th>
      <th>amount</th>
    </tr>

    <?php
    
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT a.rno, a.rdate, b.item, b.amt, b.qun FROM p1 a INNER JOIN p2 b ON a.rno=b.pid";//query
    $result=$con->query($sql);
    $no=1;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["qun"]."</td>
        <td>".$row["item"]."</td>
        <td>".$row["amt"]."</td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
</form>


<h5 >Sale Report</h5>
<form>
  <table id="customers">
    <tr>
      <th>SN</th>
      <th>Recipit No</th>
      <th>Date</th>
      <th>Quantity</th>
      <th>Item</th>
      <th>amount</th>
    </tr>

    <?php
    
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT a.rno, a.rdate, b.item, b.amt, b.qun FROM s1 a INNER JOIN s2 b ON a.rno=b.sid";//query
    $result=$con->query($sql);
    $no=1;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["qun"]."</td>
        <td>".$row["item"]."</td>
        <td>".$row["amt"]."</td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>


  <h5 >Stock Report</h5>
<form>
  <table id="customers">
    <tr>
      <th>SN</th>
      <th>Item</th>
      <th>Status</th>
    </tr>

    <?php
    
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT * FROM `item` WHERE `status`=1 ";//query
    $result=$con->query($sql);
    $no=1;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["item"]."</td>
        <td>"."AVIL"."</td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
</form>




<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>MASTER REPORT!</strong> This document contain full report of inventry managment system.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



</center>
</body>


