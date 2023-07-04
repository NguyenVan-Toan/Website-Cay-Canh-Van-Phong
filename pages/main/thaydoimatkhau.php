<?php
 if(isset($_POST['doimatkhau'])){
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT * from tbl_dangky where email = '".$taikhoan."' AND matkhau = '".$matkhau_cu."' LIMIT 1 ";
    $query = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($query);
    if($count> 0){
        $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky set  matkhau='".$matkhau_moi."' ");
        echo '<p style="color: green;">Đổi mật khẩu thành công</p>';
    }
    else{
        echo '<p style="color: green;">Sai tài khoản hoặc mật khẩu</p>';
    }
 }
?>
<form action="" autocomplete="off" method="post">
        <table border="1px" class="table_login" style="border-collapse: collapse;">
            <tr>
                <td colspan="2"><h3>Thay đổi mật khẩu </h3></td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="email" id="" ></td>
            </tr>
            <tr>
                <td>Mật khẩu cũ</td>
                <td><input type="text" name="password_cu" id=""></td>
            </tr>
            <tr>
                <td>Mật khẩu mới</td>
                <td><input type="text" name="password_moi" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
            </tr>
        </table>
    </form>