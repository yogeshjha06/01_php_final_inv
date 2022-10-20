<head>
    <style>
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

  echo"
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Client</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a class='active' href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>
<?php
$rno=$_GET['rno'];
$date=$_GET['date'];
$name=$_GET['name'];
error_reporting(0);
?>
</head>
<center>
<h5>Client Manage</h5>
<table>
        <tr>
            <td>Reciving ID</td>
            <td><?php echo" <input type='number' name='rno' value='$rno' readonly>";?></td>
        </tr>
        <tr>
            <td>Reciving Date</td>
            <td><?php echo" <input type='date' name='date' value='$date' readonly>";?></td>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td><?php echo" <input type='text' name='name' value='$name' readonly>";?></td>
        </tr>
<form method="POST">
    
        <tr>
                <td>Item</td>
                <td>
                <select name="item" id="item">    
                <?php $con=mysqli_connect("localhost","root","","bd");//connection
                      $sql="SELECT * FROM item";//query
                      $result2=mysqli_query($con,$sql);?>            
                <?php while ($row2=mysqli_fetch_array($result2)):; ?>
                <option value="<?php echo$row2[1];?>"><?php echo$row2[1];?></option>
                <?php endwhile;?>
            </select>
                </td>
        </tr>
        <tr>
                <td>Quantity</td>
                <td><input type='number' name='qun' placeholder='Enter Quantity'></td>
        </tr>
        <tr>
            <td><button name="ok" type="submit">ADD</button></td>
            <td><button name="no" type="submit">BACK</button></td>
        </tr>
    </table>
</form>



<?php
$n=$_GET['n'];

if($n==1)//delete code
{
        //submit del code
        $con=mysqli_connect("localhost","root","","bd");//connection
        $sql="DELETE FROM p1 WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/sale1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/sale1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code

                $item=$_POST['item'];//item input
                $qun=$_POST['qun'];//quntity input
            }
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/sale1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql1 = "SELECT * FROM `p1` WHERE `rno`='$rno'";
            $result1 = mysqli_query($con,$sql1);
            $rs1 = mysqli_fetch_array($result1);
            $pid = $rs1[0];//id no

            $item=$_POST['item'];//item input
            $qun=$_POST['qun'];//quntity input

            $sql = "SELECT * FROM `item` WHERE `item`='$item'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $price = $row[2];//price

            $sql = "SELECT * FROM `p2` WHERE `item`='$item'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $qun1 = $row[4];//price

            $amt=$qun*$price;
            if($qun<=$qun1)
            {
              $sql2="INSERT INTO `s2`(`sid`, `item`, `price`, `qun`, `amt`) VALUES ('$rno','$item','$price','$qun','$amt')";//query
              $resultx=$con->query($sql2);
            }
            else
            {
              $_SESSION['Invalid Input Quantity'];
              header("http://localhost/inv1/sale3.php");
            }

        }

}

?>
<table id="customers">

<tr>
    <th>S.No</th>
    <th>ITEM</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>AMOUNT</th>
  </tr>


<?php
      $sql="SELECT * FROM s2 WHERE sid = '$rno'";
      $result=$con->query($sql);
      $no=1;
      while($row=$result->fetch_assoc())
      {
        echo"
        <tr>
          <td>".$no."</td>
          <td>".$row["item"]."</td>
          <td>".$row["price"]."</td>
          <td>".$row["qun"]."</td>
          <td>".$row["amt"]."</td>
          </tr>
        ";
        $no++;
      }
      
?>
</table>

<form method="POST">
<button name="save" type="submit">SAVE</button>
</form>

<?php
if (isset($_POST['save']))
{
    $sql = "SELECT  SUM(amt) from s2 where sid=$rno";
    $result = $con->query($sql);
    $f=0;
//display data on web page
    while($row = mysqli_fetch_array($result))
    {
        echo " Total cost: ". $row['SUM(amt)'];
        echo "<br>";
        $f=$f+$row['SUM(amt)'];
    }
    $sql = "UPDATE `s1` SET `amt`='$f' WHERE rno=$rno";
    $result = $con->query($sql);
}
?>
</center>