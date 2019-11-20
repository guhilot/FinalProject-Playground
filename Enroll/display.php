<?php
    $con = new mysqli('localhost','root','','CS565');
    if($con->connect_error){
        echo 'database connection error';
    }
   
    $id = $_GET['brand'];
    $sql = " SELECT name FROM products WHERE brand = $brand ";
    $res = mysqli_query($con,$sql);

    $result = array();
    while($row = mysqli_fetch_array($res)){
        array_push($result, array('name'=>$row[0]));
    }
    echo json_encode(array('result'=>$result));
    mysqli_close($con);
?>