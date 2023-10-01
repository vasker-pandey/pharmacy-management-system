<!-- <?php
    include "connection.php";
?>
<?php
    $sql = "SELECT  SUM(product_price) from pharmacy";
    $result = $con->query($sql);
    //display data on web page
    while($row = mysqli_fetch_array($result)){
        echo " Total cost: ". $row['SUM(product_price)'];
        echo "<br>";
    }
    $con->close();
?> -->