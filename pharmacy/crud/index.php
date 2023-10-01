<?php

require_once ("../crud/component.php");
require_once ("../crud/operation.php");



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmacy System</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
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
</style>



</head>
<body>

<main>

<div class="sorted" style="background-color:yellow;">
        <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-briefcase-medical"></i> Pharmacy Management System</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="row pt-2">
                    <div class="col">
                    <?php inputElement("<i class='fas fa-solid fa-list-ol' style='font-size: 1.5em; width: 20px'></i>","ID", "product_id", setID()); ?>
                    </div>
                    <div class="col">
                    <?php inputElement("<i class='fas fa-regular fa-file-medical' style='font-size: 1.5em; width: 20px'></i>","Serial Number", "product_number",""); ?>
                    </div>
                </div>    
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-regular fa-prescription-bottle' style='font-size: 1.5em; width: 20px'></i>","Product Name", "product_name",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-sort' style='font-size: 1.5em; width: 20px'></i>","Quantity", "product_quantity",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-coins' style='font-size: 1.5em; width: 20px'></i>","Price", "product_price",""); ?>
                    </div>
                </div>
        
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-regular fa-building' style='font-size: 1.5em; width: 20px'></i>","Producer", "product_publisher",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputDate("<i class='fas fa-calendar-check' style='font-size: 1.5em; width: 20px'></i>","Date of Manufacture", "product_manufacture",""); ?>
                    </div>
                    <div class="col">
                        <?php inputDate("<i class='fas fa-exclamation' style='font-size: 1.5em; width: 20px'></i>","Date of Expiry", "product_expire",""); ?>
                    </div>
                </div>
</div>
</div>
               

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
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                    <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                    <?php deleteBtn();?>


                </div>

            </form>
        </div>
</div>





<div class="container text-center">
        <!-- Bootstrap table  -->
        <div class="table-data">
            <table class="table table-hover table-bordered">
                <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Serial Number</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Publisher</th>
                    <th>Date of Manufacture</th>
                    <th>Date of Expiry</th>
                    <th>Edit</th>
                    
                </tr>
                </thead>
                <tbody id="tbody">
                <?php


                if(isset($_POST['read'])){
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
                                <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['product_id']; ?>"></i></td>

                            </tr>

                            <?php
                        }

                    }
                }

                if(isset($_POST['create'])){
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
                                <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['product_id']; ?>"></i></td>
                            </tr>

                            <?php
                        }

                    }
                }
                if(isset($_POST['delete'])){
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
                                <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['product_id']; ?>"></i></td>
                            </tr>

                            <?php
                        }

                    }
                }
                if(isset($_POST['update'])){
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
                                <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['product_id']; ?>"></i></td>
                            </tr>

                            <?php
                        }

                    }
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../crud/main.js"></script>
</body>
</html>