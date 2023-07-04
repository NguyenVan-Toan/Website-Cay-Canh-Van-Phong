<p>Liệt kê sản phẩm</p>
<?php
$sql_lietkesp = "SELECT * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.maDanhMuc = tbl_danhmuc.maDanhMuc order by id_sanpham desc";
$row_lietke = mysqli_query($mysqli,$sql_lietkesp);
?> 
<form action="./xuly.php" method="post">
  <table border = '1' width = '100%' style="border-collapse: collapse;">
    <tr>
        <td>ID</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh</td>
        <td>Số lượng</td>
        <td>Giá tiền</td>
        <td>Danh mục</td>
        <td>Chiều cao</td>
        <td>Mô tả</td>
        <td>Nội dung</td>
        <td>Quản lý</td>
    </tr>
    <?php
    $i = 0;
    while($rows = mysqli_fetch_array($row_lietke)){
        $i++;
    ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $rows['tenSP'];?></td>
        <td><img src="modules/quanlysanpham/uploads/<?php echo $rows['hinhAnh'];?>" alt="ảnh minh họa" width="100px"></td>
        <td><?php echo $rows['soLuong'];?></td>
        <td><?php echo $rows['giaTien'];?></td>
        <td><?php echo $rows['tenDanhMuc'];?></td>
        <td>
        <?php 
        if($rows['chieuCao'] == 0){
          echo "Mini";
        }else if($rows['chieuCao'] == 1){
          echo "Vừa";
        }else{
          echo "Lớn";
        }
        ?>
        </td>
        <td><?php echo $rows['tomtat'];?></td>
        <td><?php echo $rows['noidung'];?></td>
        <td>
            <a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $rows['id_sanpham'];?>">Xóa</a> 
            | 
            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $rows['id_sanpham'];?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>