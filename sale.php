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
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Client</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a class='active' href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>

</head>
<center>
<h5>Sale Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Reciving ID</td>
            <td><input type="number" name="rno" placeholder="Enter Reciving Id"></td>
        </tr>
        <tr>
            <td>Reciving Date</td>
            <td><input type="date" name="rdate" value="2022-10-19" min="2018-01-01" max="2025-10-19"></td>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td><select name="client" id="client">    
                <?php $con=mysqli_connect("localhost","root","","bd");//connection
                      $sql="SELECT * FROM client";//query
                      $result2=mysqli_query($con,$sql);?>            
                <?php while ($row2=mysqli_fetch_array($result2)):; ?>
                <option value="<?php echo$row2[1];?>"><?php echo$row2[1];?></option>
                <?php endwhile;?>
            </select></td>
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
        $sql="DELETE FROM s1 WHERE id=$id";//query
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
                $rno=$_POST['rno'];//purchase rno input
                $date=$_POST['rdate'];//date input
                $name=$_POST['client'];//client input

                $con=mysqli_connect("localhost","root","","bd");//connection
                $sql="UPDATE `s1` SET `rno`='$rno',`rdate`='$date',`name`='$name' WHERE id=$id";//query
                $query=mysqli_query($con,$sql);//query fire  

                header("location: http://localhost/inv1/sale1.php");
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
            $rno=$_POST['rno'];//purchase rno input
            $date=$_POST['rdate'];//date input
            $name=$_POST['client'];//client input

            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql="INSERT INTO `s1`( `rno`, `rdate`, `name`) VALUES ('$rno','$date','$name')";//query
            $result=$con->query($sql);

            if($result)
            {
                header("location: http://localhost/inv1/sale3.php?rno=$rno&date=$date&name=$name&n=3");
            }
        }

}

?>