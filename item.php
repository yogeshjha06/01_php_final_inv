<?php
error_reporting(0);
?>
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
  <li><a class='active' href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Client</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>

</head>
<center>
<h5>Item Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Item Name</td>
            <td><input type="text" name="item" placeholder="EnterItem"></td>
        </tr>
        <tr>
            <td>Item Price</td>
            <td><input type="decimal" name="price" placeholder="Enter Item Price"></td>
        </tr>
        <tr>
            <td><button name="ok" type="submit">SUBMIT</button></td>
            <td><button name="no" type="submit">BACK</button></td>
        </tr>
    </table>
</form>
</center>
<?php
$id=$_GET['id'];
$n=$_GET['n'];

if($n==1)//delete code
{
        //submit del code
        $con=mysqli_connect("localhost","root","","bd");//connection
        $sql="DELETE FROM item WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/item1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/item1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code
                $item=$_POST['item'];//item input
                $amt=$_POST['price'];//price input

                $con=mysqli_connect("localhost","root","","bd");//connection
                $sql="UPDATE `item` SET `item`='$item',`amt`='$amt' WHERE `id`=$id";//query
                $query=mysqli_query($con,$sql);//query fire
                if($query)
                {
                    echo"
                        <script>
                            alert('Item Is Updated To Our Database.');
                        </script>";
                }
                header("location: http://localhost/inv1/item1.php");
            }
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/item1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $item=$_POST['item'];//item input
            $amt=$_POST['price'];//price input

            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql="INSERT INTO `item`(`item`, `amt`) VALUES ('$item','$amt')";//query
            $query=mysqli_query($con,$sql);//query fire
            if($query)
            {
                echo"
                    <script>
                        alert('New Item Is Added To Our Database.');
                    </script>";
            }
        }

}
?>