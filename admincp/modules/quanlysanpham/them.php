<p>Thêm sản phẩm</p>
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
  <table border = '1' width = '50%' style="border-collapse: collapse;">
    <tr>
      <td>Mã sản phẩm:</td>
      <td><input type="text" name="masp" id="" placeholder="Điền mã sản phẩm" ></td>
    </tr>
    <tr>
      <td>Tên sản phẩm:</td>
      <td><input type="text" name="tensp" id="" placeholder="Điền tên sản phẩm" ></td>
    </tr>
    <tr>
      <td>Hình ảnh:</td>
      <td><input type="file" name="hinhanh" id="" ></td>
    </tr>
    <tr>
      <td>Giá:</td>
      <td><input type="text" name="giatien" id="" ></td>
    </tr>
    
    <tr>
      <td>Số lượng:</td>
      <td><input type="text" name="soluong" id="" ></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm:</td>
      <td>
        <select name="danhmucsp" style="width: 80%; height: 30px;">
          <?php
          $sql_danhmuc = "SELECT * from tbl_danhmuc order by maDanhMuc asc";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['maDanhMuc']; ?>"><?php echo $row_danhmuc['tenDanhMuc']; ?></option>
          
          <?php
          }
          ?>
        </select>
      </td>
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
      <td><textarea name="tomtat" rows="5" cols="50" style="resize: none;" ></textarea></td>
    </tr>
    <tr>
      <td>Nội dung:</td>
      <td><textarea name="noidung" rows="5" cols="50" style="resize: none;" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="themsanpham" id="" value="Thêm sản phẩm"></td>
    </tr>
  
  </table>
</form>
