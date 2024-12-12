<?php
//Nhận dữ liệu từ form
$ht = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$qq = $_POST['hometown'];
$td = $_POST['level_id'];
$nhom = $_POST['group_id'];
//kết nối csdl
require_once 'ketnoi.php';

 //viết lệnh sql để thêm dữ liệu
 $themsql = "INSERT INTO table_students
 (fullname, dob, gender, hometown, level_id, group_id) VALUES 
 ('$ht','$dob', '$gender', '$qq', '$td', '$nhom')";
 //echo $themsql; exit;

 //thực thi câu lệnh thêm
 if (mysqli_query($conn, $themsql)){

 //echo "<h1>Thêm thành công </h1>";
 //Trở về index
header("Location: index.php");
}?>