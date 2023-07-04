<?php
 if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * from tbl_dangky where email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count > 0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        echo '<p style ="color:green;">Đăng nhập thành công</p>';
        //header('Location:index.php');
    }
    //
    else{
        echo '<p style ="color:red;">Sai tài khoản hoặc mật khẩu</p>';
    }
 }
?>
<form action="" autocomplete="off" method="post">
        <table border="1px" width = "60%" class="table_login" style="border-collapse: collapse;">
            <tr>
                <td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" size="50" name="email" placeholder="Đăng nhập bằng email" id="" ></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" size="50" name="password"placeholder="Mật khẩu"  id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" id="" value="Đăng nhập"></td>
            </tr>
        </table>
    </form>