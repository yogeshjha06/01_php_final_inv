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
  <li><a class='active' href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<h5>Sale Master</h5>
<form method="POST">
    <?php echo"<button class='btn btn-outline-success' type='submit' name='ok'><a href='http://localhost/inv1/sale.php?n=3'>NEW SALE</a></button>";?>
</form>

<table id="customers">
    <tr>
        <th>SN</th>
        <th>Reciving No</th>
        <th>Reciving Date</th>
        <th>Supplier Name</th>
        <th>Amount</th>
        <th colspan="2">Action</th>
    </tr>

    <?php
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT * FROM s1 ORDER BY id DESC";//query
    $result=$con->query($sql);
    $no=1;$x=1;$y=2;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["amt"]."</td>
        <td> <button class='btn btn-outline-danger'><a href='http://localhost/inv1/sale.php?id=$row[id]&n=$x'>Delete</a></button></td>       
        <td> <button class='btn btn-outline-warning'><a href='http://localhost/inv1/sale.php?id=$row[id]&n=$y'>Edit</a></button></td>  
      </tr>
      ";
      $no++;
    }
    ?>
</table>
</center>