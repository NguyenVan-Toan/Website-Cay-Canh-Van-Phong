<?php

include("../../config/config.php");
$tensp = $_POST['tensp'];
$masp = $_POST['masp'];
$soluong = $_POST['soluong'];
$giasp = $_POST['giatien'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$chieucao = $_POST['chieucao'];
$madanhmuc = $_POST['danhmucsp'];
//xu li hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

    //them
if(isset($_POST['themsanpham'])){

    $sql_them = "INSERT INTO tbl_sanpham(maSP,tenSP,hinhAnh,soLuong,giaTien,maDanhMuc,chieuCao,tomtat,noidung) VALUE('".$masp."',
    '".$tensp."','".$hinhanh."','".$soluong."','".$giasp."','".$madanhmuc."','".$chieucao."','".$tomtat."','".$noidung."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header("Location:../../index.php?action=quanlysanpham&query=them");
}
//sua san pham
elseif(isset($_POST['suasanpham'])){
    if(!empty($_FILES['hinhanh']['name'])){
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        
        $sql_update = "UPDATE tbl_sanpham set tenSP ='".$tensp."', maSP ='".$masp."', hinhAnh ='".$hinhanh."', 
        soLuong ='".$soluong."', giaTien ='".$giasp."', chieuCao ='".$chieucao."', tomtat ='".$tomtat."',noidung ='".$noidung."',
        maDanhMuc ='".$madanhmuc."'  where id_sanpham = '$_GET[idsanpham]'";
        //xoa hinh ảnh cũ
        $sql = "SELECT * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]' limit 1";
        $query_xoaAnh = mysqli_query($mysqli,$sql);
        while($rowx = mysqli_fetch_array($query_xoaAnh)){
            unlink('uploads/'.$rowx['hinhAnh']);
        }
    }else{
        $sql_update = "UPDATE tbl_sanpham set tenSP ='".$tensp."', maSP ='".$masp."',soLuong ='".$soluong."', giaTien ='".$giasp."', 
        chieuCao ='".$chieucao."', tomtat ='".$tomtat."',noidung ='".$noidung."',
        maDanhMuc ='".$madanhmuc."'  where id_sanpham = '$_GET[idsanpham]'";
    }
    mysqli_query($mysqli,$sql_update);
    header("Location:../../index.php?action=quanlysanpham&query=them");
}
else{
    $id = $_GET['idsanpham'];
    $sql = "SELECT * from tbl_sanpham where id_sanpham = '$id' limit 1";
    $query_xoaAnh = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query_xoaAnh)){
        unlink("./uploads/".$row['hinhAnh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham where id_sanpham = '".$id."' ";
    mysqli_query($mysqli,$sql_xoa);
    header("Location:../../index.php?action=quanlysanpham&query=them");
}
?>