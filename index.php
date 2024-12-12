<!DOCTYPE html>
<html lang="en">  
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <meta charset="UFT-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách sinh viên</title>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
    </head>
    <body style="background-image: url('backgroud.jpg');">
     <div class="container" >
     <h1><img src="logodoi.jpg" alt="logodoi"> DANH SÁCH SINH VIÊN <img src="logotruong.jpg" alt="logotruong"></h1>
     <div class="head">
    <div class="form-add">
      <button class="add-btn" type="button" data-toggle="modal" data-target="#myModal"><i class="fa-solid fa-user-plus"></i> | Thêm sinh viên </button>
    </div>
    <div class="form-search">
        <form method="POST">
      <input class="search" name="nd" type="text" placeholder="Nhập thông tin để tìm kiếm">
      <button class="search-btn" type="submit" name="btn"><i class="fa-solid fa-magnifying-glass"></i>  | Tìm kiếm</button>
        </form>
    </div>
        </div>
    <table>
      <thead style="text-align: center;">
        <tr>
        <th><i class="fa-solid fa-user"></i> Họ và tên</th>
        <th><i class="fa-solid fa-cake-candles"></i> Ngày sinh</th>
        <th><i class="fa-solid fa-venus-mars"></i> Giới tính</th>
        <th><i class="fa-solid fa-house"></i> Quê quán</th>
        <th><i class="fa-solid fa-graduation-cap"></i> Trình độ học vấn</th>
        <th><i class="fa-solid fa-user-group"></i> Nhóm</th>
        <th><i class="fa-solid fa-wrench"></i> Chỉnh sửa</th>
        </tr>
      </thead>
    <?php
        require_once "ketnoi.php";
        $dssv_sql = "SELECT * FROM table_students order by fullname, dob, gender, hometown, level_id, group_id";
        // thực thi câu lệnh
        if(isset($_POST['btn']) )
        {
            $noidung = $_POST['nd'];
            $dssv_sql = "SELECT * FROM table_students WHERE fullname LIKE '%$noidung%' OR hometown LIKE '%$noidung%'";
        }
        $result = mysqli_query($conn, $dssv_sql);
        //Duyệt qua biến ketqua và in
        while ($row = mysqli_fetch_assoc($result)){
          if($row['gender']==1)
            {
                $gender = "Nam";
            }
            else
            {
                $gender = "Nữ";
            }if($row['level_id']==0)
            {
                $level = "Tiến sĩ";
            }
            else if($row['level_id']==1)
            {
                $level = "Thạc sĩ";
            }
            else if($row['level_id']==2)
            {
                $level = "Kỹ sư";
            }
            else
            {
                $level = "Khác";
            }
            if($row['group_id']==1){
                $grp = 'Nhóm 1';
            }
            else if($row['group_id']==2){
                $grp = 'Nhóm 2';
            }
            else if($row['group_id']==3){
                $grp = 'Nhóm 3';
            }
            else if($row['group_id']==4){
                $grp = 'Nhóm 4';
            }
            else if($row['group_id']==5){
                $grp = 'Nhóm 5';
            }
            else if($row['group_id']==6){
                $grp = 'Nhóm 6';
            }
            else if($row['group_id']==7){
                $grp = 'Nhóm 7';
            }
            else if($row['group_id']==8){
                $grp = 'Nhóm 8';
            }
            else if($row['group_id']==9){
                $grp = 'Nhóm 9';
            }else{
                $grp = 'Không có nhóm';
            }
            $date_from_db = $row['dob'];
            $formatted_date = date('d/m/Y', strtotime($date_from_db));
    ?>
       <tr>
          <td><?php echo $row['fullname'];?></td>
          <td><?php echo $formatted_date;?></td>
          <td><?php echo $gender;?></td>
          <td><?php echo $row['hometown'];?></td>
          <td><?php echo $level;?></td>
          <td><?php echo $grp;?></td>
          <td>
              <a href="sua.php?sid=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i>  | Sửa</a> 
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá sinh viên này?')" href="xoa.php?sid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>  | Xoá</a>
          </td>
       </tr>
     <?php
     }
     ?>
     </table>
     </div>
     <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm mới sinh viên</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="tbthem.php" method="post">
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" id="fullname" class="form-control" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="dob">Ngày Sinh</label>
                    <input type="date" name="dob" id="dob" class="form-control" required>
                </div>
                <div class="form-group"> <label for="gender">Giới Tính:</label>
                        <input type="radio" id="gender" name="gender" value="1" required>
                        <label for="gender">Nam</label>
                        <input type="radio" id="gender" name="gender" value="0" required>
                        <label for="gender">Nữ</label>
                </div>
                <div class="form-group">
                    <label for="hometown">Quê Quán</label>
                    <input type="text" id="hometown" name="hometown" class="form-control" required>
                </div>
                <div class="form-level">
                    <label for="level_id" class="form-label">Trình độ học vấn</label>
                    <!--<input type="number" id="level_id" name="level_id" class="form-control" required>-->
                    <div class="form-floating">
                    <select class="form-group" id="level_id" name="level_id" required aria-label="select example" class="form-select" >        
                        <option value="0">Tiến sĩ</option>
                        <option value="1">Thạc sĩ</option>
                        <option value="2">Kỹ sư</option>
                        <option value="3">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="group_id">Nhóm</label>
                    <input type="number" id="group_id" name="group_id" class="form-control" required>
                </div>
                <div class="save">
                <button class="btn btn-success" >Lưu</button>
                </div>
            </form>
      </div>
    </div>
    </div>
    </div>
    </body>
</html>