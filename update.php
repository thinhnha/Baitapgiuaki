<?php
//Nhận dữ liệu từ form
$ht = $_POST['fullname'];
$dob = $_POST['dob'];
$sex = $_POST['gender'];
$qq = $_POST['hometown'];
$lv = $_POST['level_id'];
$gr = $_POST['group_id'];
$id = $_POST['sid'];
//kết nối csdl
require_once 'ketnoi.php';

 //viết lệnh sql để thêm dữ liệu
 $updatesql = "UPDATE table_students
 SET fullname='$ht', dob='$dob', gender='$sex', hometown='$qq', level_id='$lv', group_id='$gr' WHERE id=$id";
 //echo $updatesql; exit;

 //thực thi câu lệnh thêm
 if (mysqli_query($conn, $updatesql)){

 //echo "<h1>Thêm thành công </h1>"; 
 //Trở về index
header("Location: index.php");
}?>