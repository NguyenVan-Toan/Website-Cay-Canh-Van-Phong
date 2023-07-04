<?php
if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);
    $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,sdt,diachi,matkhau) 
    VALUE('".$tenkhachhang."','".$email."','".$dienthoai."','".$diachi."','".$matkhau."')");
    if($sql_dangky){
        echo '<p style = "color: green;">Bạn đã đăng ký thành công</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        //header("Location:index.php?quanly=''");
    }
}
?>
<style type="text/css">
    table.table_dangky tr td {
        padding: 5px;
    }
</style>
<p>Đăng kí thành viên</p>
<form action="" method="post">
    <table class="table_dangky" border="1"  style="border-collapse: collapse; width: 70%">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="60%" name="hovaten" id=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="60%" name="email" id=""></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" size="60%" name="dienthoai" id=""></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="60%" name="diachi" id=""></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" size="60%" name="matkhau" id=""></td>
        </tr>
        <tr>
            <td><input style="cursor: pointer;" type="submit" name="dangky" value="Đăng ký" id=""></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập</a></td>
        </tr>
    </table>
</form>