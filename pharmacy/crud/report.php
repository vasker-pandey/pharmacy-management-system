<?php

require_once ("../crud/component.php");
require_once ("../crud/operation.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
#sidebar {
  font-family: "Lato", sans-serif;
  position: fixed;
  display: flex;
  margin: 0;
  padding: 0;
  /* top: -5px; */
  top: 0px;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 200px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.ref::before {
  font-weight: bold;
  color: grey;
  content: "Report Number: ";
}
</style>

</head>
<body>
 

  <div class="container text-center">
        <h1 class="py-4" style="margin : 0; padding-top:0;"> Report Generated</h1>
        <p> For the month of </p>
        <div id="current_date">
      <script>
      document.getElementById("current_date").innerHTML = Date();
      document.write("<br><br>");
      </script>
      
        </div>
  </div>
  
  <p id="demo" style="margin-left: 195px; " class="ref"></p>
<script>
let x = Math.floor((Math.random() * 10000000) + 1);

document.getElementById("demo").innerHTML = x;
</script>
  



<div id="sidebar">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Home</a>
  <a href="report.php">Report</a>
  <a href="../login/logout.php">Logout</a>
</div>



<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</div>


<div class="container text-center">
        <!-- Bootstrap table  -->
        <div class="table-data">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Serial Number</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Publisher</th>
                    <th>Date of Manufacture</th>
                    <th>Date of Expiry</th>
                    
                    
                </tr>
                </thead>
                <tbody id="tbody">
                <?php


                
                    $result = getData();


                    if($result){

                        while ($row = mysqli_fetch_assoc($result)){ ?>

                            <tr>
                            <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_number']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_quantity']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo 'Rs ' . $row['product_price']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_publisher']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_manufacture']; ?></td>
                                <td data-id="<?php echo $row['product_id']; ?>"><?php echo $row['product_expire']; ?></td>
                                                               
                            </tr>

                            <?php
                        }

                    }
                

                ?>
                </tbody>
            </table>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../crud/main.js"></script>
</body>
</html>