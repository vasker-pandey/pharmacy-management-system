<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}


if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $productid = textboxValue("product_id");
    $productnumber = textboxValue("product_number");
    $productname = textboxValue("product_name");
    $productquantity = textboxValue("product_quantity");
    $productprice = textboxValue("product_price");
    $productpublisher = textboxValue("product_publisher");
    $productmanufacture = textboxValue("product_manufacture");
    $productexpire = textboxValue("product_expire");
    
    $sql3 = "SELECT * FROM pharmacy where product_number='$productnumber';";

    $dup = mysqli_query($GLOBALS['con'], $sql3);

    if(mysqli_num_rows($dup) > 0){
        TextNode("error", " &nbsp &nbsp &nbsp Duplicate Entry");
        return false;
    }

    // $dup = "select * from pharmacy where product_number='$productnumber';
    // ";
    // mysqli_query($GLOBALS['con'],$dup);
    // if(mysqli_num_rows($dup)>0)
    // {
    //     echo "Duplicate entry";
    // }


    if($productnumber && $productname && $productquantity && $productprice && $productpublisher && $productmanufacture && $productexpire){

        $sql = "INSERT INTO pharmacy (product_number, product_name, product_quantity, product_price, product_publisher, product_manufacture, product_expire) 
                        VALUES ('$productnumber','$productname','$productquantity','$productprice','$productpublisher','$productmanufacture','$productexpire')";


      
        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", " &nbsp &nbsp &nbsp Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
        TextNode("error", " &nbsp &nbsp &nbsp Provide Data in the Textbox");
    }
    $sql1 = "
    UPDATE pharmacy SET product_total = product_price*product_quantity WHERE product_id='$productid';                    
    ";
    mysqli_query($GLOBALS['con'],$sql1);
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM pharmacy";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}



// update dat
function UpdateData(){
    $productid = textboxValue("product_id");
    $productnumber = textboxValue("product_number");
    $productname = textboxValue("product_name");
    $productquantity = textboxValue("product_quantity");
    $productprice = textboxValue("product_price");
    $productpublisher = textboxValue("product_publisher");
    $productmanufacture = textboxValue("product_manufacture");
    $productexpire = textboxValue("product_expire");

    if($productnumber && $productname && $productquantity && $productprice && $productpublisher && $productmanufacture && $productexpire){
        $sql = "
                    UPDATE pharmacy SET product_number='$productnumber', product_name='$productname', product_quantity = '$productquantity', product_price = '$productprice', product_publisher = '$productpublisher', product_manufacture = '$productmanufacture', product_expire = '$productexpire' WHERE product_id='$productid';                    
        ";
       
        
        

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", " &nbsp &nbsp &nbsp Data Successfully Updated");
        }else{
            TextNode("error", " &nbsp &nbsp &nbsp Enable to Update Data");
        }
        
    }else{
        TextNode("error", " &nbsp &nbsp &nbsp Select Data Using Edit Icon");
    }

    $sql1 = "
    UPDATE pharmacy SET product_total = product_price*product_quantity WHERE product_id='$productid';                    
    ";
    mysqli_query($GLOBALS['con'],$sql1);
}


function deleteRecord(){
    $productid = (int)textboxValue("product_id");

    $sql = "DELETE FROM pharmacy WHERE product_id=$productid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success"," &nbsp &nbsp &nbsp Record Deleted Successfully...!");
    }else{
        TextNode("error"," &nbsp &nbsp &nbsp Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE pharmacy";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success"," &nbsp &nbsp &nbsp All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error"," &nbsp &nbsp &nbsp Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['product_id'];
        }
    }
    return ($id + 1);
}









