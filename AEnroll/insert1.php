<?php
$id = $_POST['id'];
$aid = $_POST['aid'];
$aname = $_POST['aname'];
$age = $_POST['age'];
$loc = $_POST['aloc'];


$con = new mysqli('localhost','root','','CS565');
if($con->connect_error){
    echo 'database connection error';
}
$stmt = $con->prepare("INSERT INTO `A_Rel` (`id`, `A_id`) VALUES (?, ?)");
$stmt->bind_param("ii",$id,$aid);
if($stmt->execute()){
    echo 'success';
}else{
    echo 'failure';
}

$stmt = $con->prepare("INSERT INTO `Activity` (`A_id`, `A_Name`, `Age`, `Location`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isis",$aid,$aname,$age,$loc);
if($stmt->execute()){
    echo 'success';
}else{
    echo 'failure';
}
?>