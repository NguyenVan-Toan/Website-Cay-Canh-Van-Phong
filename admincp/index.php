<?php
session_start();
// $_GET['dangxuat'] = 0;
if(!isset($_SESSION['dangnhap'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_admincp.css">
    
    <title>admincp</title>
</head>
<body>
    <h3 class="title_admincp">Chào mừng bạn đến với trang admincp</h3>
    <div class="wrapper">
    <?php
        include("./config/config.php");
        include("./modules/header.php");
        include("./modules/menu.php");
        include("./modules/main.php");
        include("./modules/footer.php");
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'noidung' );
    </script>
    <script>
        CKEDITOR.replace( 'mota' );
    </script>
    <script>
        CKEDITOR.replace( 'tomtat' );
    </script>
    <script>
        CKEDITOR.replace( 'thongtinlienhe' );
    </script>
</body>
</html>