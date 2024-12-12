<?php
require_once 'ketnoi.php';
$id = $_GET['sid'];
 //câu lệnhn lấy thông tin sinh viên  có id = $idsv
 $sua_sql = "SELECT * FROM table_students WHERE id=$id";
 $result = mysqli_query($conn, $sua_sql);
 $row = mysqli_fetch_assoc($result);
 //hiển thị thông tin
 ?>
 
<!DOCTYPE html>
<html lang="en">  
    <head>
        <meta charset="UFT-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sửa thông tin sinh viên</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h1 style="text-align: center;">Cập nhật thông tin sinh viên</h1>
            <form action="update.php" method="post">
                <input type="hidden" name="sid" value="<?php echo $id;?>" id="">
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" id="fullname" class="form-control" 
                    name="fullname" value="<?php echo $row['fullname']?>">
                </div>
                <div class="form-group">
                    <label for="dob">Ngày Sinh</label>
                    <input type="date" name="dob" id="dob" class="form-control"
                    value="<?php echo $row['dob']?>">
                </div>
                <div>
                    <label  for="gender" >Giới tính:</label>
                    <input  type="radio" name="gender" value="1" <?= $row['gender']==1 ? 'checked': ''?> required>
                    <label for="gender">Nam</label>
                    <input  type="radio" name="gender" value="0" <?= $row['gender']==0 ? 'checked': ''?> required>
                    <label for="gender">Nữ</label>
                </div>
                <div class="form-group">
                    <label for="hometown">Quê Quán</label>
                    <input type="text" id="hometown" name="hometown" class="form-control"
                    value="<?php echo $row['hometown']?>">
                </div>
                <div class="form-group">
                    <label for="level_id">Trình độ học vấn</label>
                    <!--<input type="number" id="level_id" name="level_id" class="form-control" required>-->
                    <div class="form-floating"><select class="form-group" id="level_id" name="level_id" required aria-label="select example" class="form-select">   
                        <option value="0" <?=$row['level_id']==0 ? 'selected':''?>>Tiến sĩ</option>
                        <option value="1" <?=$row['level_id']==1 ? 'selected':''?>>Thạc sĩ</option>
                        <option value="2" <?=$row['level_id']==2 ? 'selected':''?>>Kỹ sư</option>
                        <option value="3" <?=$row['level_id']==3 ? 'selected':''?>>Khác</option>
                    </select>
                <div class="form-group">
                    <label for="group_id">Nhóm</label>
                    <input type="number" id="group_id" name="group_id" class="form-control"
                    value="<?php echo $row['group_id']?>">
                </div>
                <button class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </body>
</html>