<?php
require_once 'ketnoi.php';
$idsv = $_GET['sid'];
//echo $id;
//câu lệnh sql
$xoa_sql = "DELETE FROM table_students WHERE id=$idsv";
mysqli_query($conn, $xoa_sql);
//echo '<h1>Xoá thành công</h1>';
//Trở về index
header("Location: index.php");
?>