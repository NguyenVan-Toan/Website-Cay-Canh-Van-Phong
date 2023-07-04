<?php
 session_start();
 include('config/config.php');
 if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * from tbl_admin where username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1 ";
    $query = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($query);
    if($count> 0){
        $_SESSION['dangnhap'] = $taikhoan;
        header('Location:index.php');
    }
    else{
        echo '<script>alert("Sai tài khoản hoặc mật khẩu")</script>';
        header('Location:login.php');
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body{
            background-color: #d2d2d2;

        }
        .wrapper_login {
            width: 30%;
            margin: 50px auto;
        }
        .table_login{
            width: 100%;

        }
        .table_login tr{
            margin: 5px;
            
        }
    </style>
</head>
<body>
    <div class="wrapper_login" style="text-align: center;">
    <form action="" autocomplete="off" method="post">
        <table border="1px" class="table_login" style="border-collapse: collapse;">
            <tr>
                <td colspan="2"><h3>Đăng nhập admin</h3></td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" id="" ></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" id="" value="Đăng nhập"></td>
            </tr>
        </table>
    </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</body>
</html>
