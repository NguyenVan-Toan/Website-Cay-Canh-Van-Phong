<?php
    $sql_sua = "SELECT * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]' limit 1";
    $row_suadanhmuc = mysqli_query($mysqli,$sql_sua);
?>
<p>Sửa sản phẩm</p>
<?php
while($row = mysqli_fetch_array($row_suadanhmuc)){
?>
<form action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
  <table border = '1' width = '50%' style="border-collapse: collapse;">
    <tr>
      <td>Mã sản phẩm:</td>
      <td><input type="text" name="masp" id="" value="<?php echo $row['maSP'] ?>" placeholder="Điền mã sản phẩm" ></td>
    </tr>
    <tr>
      <td>Tên sản phẩm:</td>
      <td><input type="text" name="tensp" id="" value="<?php echo $row['tenSP'] ?>" placeholder="Điền tên sản phẩm" ></td>
    </tr>
    <tr>
      <td>Hình ảnh:</td>
      <td>
        <input type="file" name="hinhanh" >
        <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'];?>" alt="ảnh minh họa" width="100px">
      </td>
    </tr>
    <tr>
      <td>Giá:</td>
      <td><input type="text" name="giatien" id="" value="<?php echo $row['giaTien'] ?>" ></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm:</td>
      <td>
        <select name="danhmucsp" style="width: 80%; height: 30px;">
          <?php
          $sql_danhmuc = "SELECT * from tbl_danhmuc order by maDanhMuc asc";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['maDanhMuc'] == $row['maDanhMuc']){
          ?>
          <option selected value="<?php echo $row_danhmuc['maDanhMuc']; ?>"><?php echo $row_danhmuc['tenDanhMuc']; ?></option>
          
          <?php
            }
            else{
              ?>
            <option value="<?php echo $row_danhmuc['maDanhMuc']; ?>"><?php echo $row_danhmuc['tenDanhMuc']; ?></option>
              <?php
            }
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Số lượng:</td>
      <td><input type="text" name="soluong" id="" value="<?php echo $row['soLuong'] ?>" ></td>
    </tr>
    <tr>
      <td>Chiều cao:</td>
      <td>
        <select name="chieucao" style="width: 100px; height: 30px;">
          <option value="0">Mini</option>
          <option value="1">Vừa</option>
          <option value="2">Lớn</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Mô tả:</td>
      <td><textarea name="tomtat" rows="5" cols="50" style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
      <td>Nội dung:</td>
      <td><textarea name="noidung" rows="5" cols="50" style="resize: none;"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="suasanpham" id="" value="Sửa sản phẩm"></td>
    </tr>
  
  </table>
</form>
<?php
}
?>