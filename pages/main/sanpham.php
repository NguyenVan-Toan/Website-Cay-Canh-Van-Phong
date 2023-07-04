<p><h3>Chi tiết sản phẩm</h3></p>
<?php
    $sql_chitiet= "SELECT * from tbl_sanpham,tbl_danhmuc 
    where tbl_sanpham.maDanhMuc = tbl_danhmuc.maDanhMuc 
    and tbl_sanpham.id_sanpham = '$_GET[id]' limit 1";
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row = mysqli_fetch_array($query_chitiet)){
    
?>
<div class="wrapper_detail">

    <div class="hinhanh_sanpham">
        <img width="90%" src="admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
    </div>
    <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="post">
    <div class="chitiet_sanpham">
        <h3 style="margin-top: 0;"><?php echo $row['tenSP'] ?></h3>
        <p>Mã sản phẩm: <?php echo $row['maSP'] ?></p>
        <p>Số lượng: <?php echo $row['soLuong'] ?></p>
        <p>Giá tiền: <?php echo number_format($row['giaTien'],0,',','.')  ?></p>
        <p>Danh mục: <?php echo $row['tenDanhMuc'] ?></p>
        <p><input class="themgiohang" type="submit" name="themgiohang" id="" value="Thêm vào giỏ hàng"></p>
    </div>
    </form>
</div>
<div class="clear"></div>

<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Mô tả cây</a></li>
    <li><a href="#tab2">Nội dung chi tiết</a></li>
    <li><a href="#tab3">Hình ảnh </a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
        <?php echo $row['tomtat'] ?>
    </div>
    <div id="tab2" class="tab-content">
        <?php echo $row['noidung'] ?>
    </div>
    <div id="tab3" class="tab-content">
        <img width="50%" src="admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
    </div>
  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->

<?php
    }
?>